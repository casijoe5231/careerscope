<tr><td><label><span style='color:red;'>*</span><strong>Course of study</strong></label></td>
				<td><select name="course" id="input-course" temp="Please select course of study" onblur="validator5(this)">
                <option value="Select">Select</option>
				<option value="BE">BE</option>
                <option value="BPharma">BPharma</option>
                </select>
				<label ><span id="course" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Discipline:</strong></label></td>
				<td><select name="discipline" id="input-discipline" temp="Please select discipline" onblur="validator2(this)">
                <option value="Select">Select</option>
				<option value="Computer">Computer</option>
                <option value="IT">IT</option>
                <option value="Mechanical">Mechanical</option>
                <option value="EXTC">EXTC</option>
                </select>
				<label ><span id="discipline" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
				<td><select name="year" id="input-year" temp="Please select the year" onblur="validator6(this)">
                <option value="Select">Select</option>
				<option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
				<option value="Fifth">Fifth</option>
                </select>
				<label ><span id="year" style="color:#C00;"></span></label>
                </td>
				
				<td><label><span style='color:red;'>*</span><strong>Aggregate:</strong></label></td>
				<td><input  type="text" class="text2" name="aggregate" id="input-aggregate" temp="Please enter your aggregate." onblur="validate1(this);" />
				<label><span id="aggregate" style="color:#C00;"></span></label>
				</td></tr>