#!/usr/local/bin/perl -w
#
# sha1pass -- Ken Draper <robo at manipulate dot org>
#
# Generates an 8-byte-salted SHA1 password from a plaintext
# input string.  Salt goes at the end of the string.
#
# Password may be input as an argument on the command-line,
# piped as standard input, or entered in reply to a non-echoed
# prompt.
#
# $Id: sha1pass,v 1.2 2003/06/02 21:04:44 kjd Exp kjd $
#

use 5.006;

use strict;
use warnings;

use POSIX;
use MIME::Base64;
use Digest::SHA1;

sub sprinkle ($);
sub read_stdin_passwd ();
sub input_is_a_tty ();
sub user_response ();
sub echo_off ($$);
sub echo_on ($$);

#=======================================
# Main
#=======================================
my ($ctx, $pass, $hash, $salt);

$pass = shift or do {
    $pass = read_stdin_passwd();
};

$ctx = Digest::SHA1->new;
$salt = sprinkle(8);            # get an 8-byte random salt

$ctx->add($pass);
$ctx->add($salt);

$hash = '{SSHA}' . encode_base64($ctx->digest . $salt, '');
print "$hash\n";


#===============================================================
# FUNCTIONS
#===============================================================

##
# sprinkle ( nbytes )
#
# Returns nbytes bytes of randomness, using entropy device if present
#
sub sprinkle ($) {
    my $n = $_[0];      # how many random bytes
    my ($salt, $len, $entropy_file);

    my @entropy_files = qw(/dev/random /dev/urandom);

    my $have_entropy = 0;
    foreach $entropy_file (@entropy_files) {
        #warn "debug: sprinkle(): trying entropy file $entropy_file\n";
        if (open(RAND, $entropy_file)) {
            $have_entropy++;
            last;
        }
        else {
            next;
        }
    }

    if (!$have_entropy) {
        #warn "debug: sprinkle(): no entropy file, using rand()\n";
        my @granules;
        for (my $i = 0; $i < $n; $i++) {
            $granules[$i] = rand 256;
        }
        $salt = pack('C8', @granules);
    }
    else {
        unless ( ($len = read(RAND, $salt, $n)) == $n) {
            warn "sprinkle(): got $len bytes of entropy for seed (need $n)\n";
            die "sprinkle(): last error was: $!\n";
        }
    
        close(RAND) || do {
            warn "sprinkle(): Error closing entropy source: $!\n";
            warn "sprinkle(): Attempting to continue normally...\n";
        };
    }

    #warn "debug: sprinkle(): b64salt: ", encode_base64($salt);
    return($salt);
}

##
# read_stdin_passwd -- Gets passwd from STDIN; no echo if input is a tty
#
sub read_stdin_passwd () {
    my ($t, $term_orig, $pass);

    if (input_is_a_tty) {
        $t = POSIX::Termios->new();
        $t->getattr();
        $term_orig = $t->getlflag();

        echo_off(\$t, \$term_orig);
        $pass = user_response();
        echo_on(\$t, \$term_orig);
    }
    else {
        $pass = <STDIN>;
        chomp($pass);
    }

    return($pass);
}

sub input_is_a_tty () { return -t STDIN && -t STDOUT }

##
# user_response -- Prompts for a password until it gets one
#
sub user_response () {
    my ($ret, $pass);

    print STDERR "Password: ";
    while ($pass = <STDIN>) {
        chomp($pass);

        if (length($pass) > 0) {
            last;
        }
        else {
            print STDERR "\nPassword: ";
        }
    }
    print "\n";
    return($pass);
}

##
# echo_off ( Termios obj ref , current terminal flags ref )
#
# Disables terminal echo
#
sub echo_off ($$) {
    my ($t, $term_orig) = @_;
    my ($echo, $no_echo);

    $echo = (&POSIX::ECHO|&POSIX::ECHOK);
    $no_echo = $$term_orig;
    $no_echo &= ~$echo;
    $$t->setlflag($no_echo);
    $$t->setattr(0, &TCSANOW);
}

##
# echo_on ( Termios obj ref , original terminal flags ref )
#
# Restores specified original terminal state
#
sub echo_on ($$) {
    my ($t, $term_orig) = @_;

    $$t->setlflag($$term_orig);
    $$t->setattr(0, &TCSANOW);
}


#!/usr/local/bin/perl -w
#
# Test script for sha1pass outputs
#
# Usage: cmpsha1pass <hashed password> <plaintext password>
#

use strict;
use warnings;

use MIME::Base64;
use Digest::SHA1;

my $hash = shift || usage();    # stored hashed password (incl. salt)
my $pass = shift || usage();    # actual password for comparison

my $binary_hash = decode_base64($hash);
my $salt = substr($binary_hash, -8, 8);         # extract salt
warn "debug: got b64salt: ", encode_base64($salt);

my $ctx = Digest::SHA1->new;
$ctx->add($pass);
$ctx->add($salt);
my $cmp_hash = '{SSHA}' . encode_base64($ctx->digest . $salt, '');

print "Original: ", "$hash\n";
print "Computed: ", "$cmp_hash\n";

if ($hash eq $cmp_hash) {
    print "Passwords match.\n";
}
else {
    print "Passwords do not match!\n";
}

exit(0);


sub usage {
    die "Usage: $0 <hashed password> <plaintext password>\n";
}
