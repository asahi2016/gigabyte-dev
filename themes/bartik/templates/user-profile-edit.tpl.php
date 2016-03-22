<style>
    .border {
        -webkit-box-shadow: 0px 0px 1px 0px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 1px 0px rgba(0,0,0,1);
        box-shadow: 0px 0px 1px 0px rgba(0,0,0,1);
    }

    .Question {
        padding-left: 30px;
        padding-top: 10px;
    }

    .Question > label {
        padding-right: 30px;
    }
</style>
<script>
    $(function () {
        $('#password').hide()
        $('#Q1_other').hide()
        $('#Q4_other').hide()
        $('#Q5_other').hide()
    });

    function display(id) {
        $(id).fadeToggle()
    }
</script>
<table>
    <tbody>
    <tr>
        <td><p style="font-weight:900; font-size:27px; margin-top:30px; margin-bottom:30px; color:#12406a;">Account Management</p></td>
    </tr>
    </tbody>
</table>

<div class="border" style="width:1000px; margin:0 auto 0 auto;">
    <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;">Personal Information</div>
    <table style="width:940px; margin:0 30px 0 30px;">
        <tbody>
        <tr>
            <td>First Name: Jack</td>
            <td>Last Name: Wan</td>
        </tr>
        <tr>
            <td>Email Address (Login ID): jackwan@gigabyteusa.com</td>
            <td>Contact Number: <input id="Text1" type="text" value="626-854-9338 ext. 157" /></td>
        </tr>
        <tr>
            <td colspan="2"><hr /></td>
        </tr>
        </tbody>
    </table>
    <table id="password" style="width:940px; margin:0 30px 0 30px;">
        <tbody>
        <tr>
            <td>Current Password: <input id="Password1" type="password" /></td>
            <td>New Password: <input id="Password1" type="password" /></td>
            <td>Confirm Password: <input id="Password1" type="password" /></td>
        </tr>
        <tr>
            <td colspan="3"><hr /></td>
        </tr>
        </tbody>
    </table>
    <div style="text-align:center; padding-bottom:10px;">
        <input id="Button1" type="button" value="Change Password" onclick="display('#password')" />
    </div>
</div>

<table style="margin-top:30px;">
    <tbody>
    <tr>
        <td>
            <div class="border" style="width:485px; height:450px;">
                <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;">Company Information</div>
                <div style="padding-left:30px; padding-right:30px; padding-bottom:10px;">
                    Company Name: GIGABYTE<br /><br />
                    Member Type: GIGABYTE Employees<br /><br />
                    Job Title: Web Master<br /><br />
                    Country: <select id="Select1">
                        <option>United States</option>
                        <option>Canada</option>
                    </select><br /><br />
                    Business Address 1: <input id="Text1" type="text" value="17358 Railroad St" /><br /><br />
                    Business Address 2: <input id="Text1" type="text" /><br /><br />
                    City: <input id="Text1" type="text" value="City of Industry" /><br /><br />
                    State: <input id="Text1" type="text" value="CA" style="width:50px;" /><br /><br />
                    Zip Code: <input id="Text1" type="text" value="91748" style="width:50px;" />
                </div>
            </div>
        </td>
        <td style="width:30px;"></td>
        <td>
            <div class="border" style="width:485px; height:450px;">
                <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;">RMA Contact</div>
                <div style="padding-left:30px; padding-right:30px; padding-bottom:10px;">
                    RMA First Name: Jack<br /><br />
                    RMA Last Name: Wan<br /><br />
                    Contact Number:<input id="Text1" type="text" value="626-854-9338 ext. 157" /><br /><br />
                    Country: <select id="Select1">
                        <option>United States</option>
                        <option>Canada</option>
                    </select><br /><br />
                    Shipping Address 1: <input id="Text1" type="text" value="17358 Railroad St" /><br /><br />
                    Shipping Address 2: <input id="Text1" type="text" /><br /><br />
                    City: <input id="Text1" type="text" value="City of Industry" /><br /><br />
                    State: <input id="Text1" type="text" value="CA" style="width:50px;" /><br /><br />
                    Zip Code: <input id="Text1" type="text" value="91748" style="width:50px;" />
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>

<div class="border" style="width:1000px; margin:30px auto 0 auto;">
    <div style="padding:30px 30px 30px 30px;">
        1. Are you participating following programs? (Check all that apply)<br />
        <div class="Question">
            <label><input type="checkbox" name="CheckboxGroup1" checked="checked">None</label>
            <label><input type="checkbox" name="CheckboxGroup1">Intel Product Dealer</label>
            <label><input type="checkbox" name="CheckboxGroup1">Intel Solution Provider</label>
            <label><input type="checkbox" name="CheckboxGroup1">Intel Premier Provider</label>
            <label><input type="checkbox" name="CheckboxGroup1">Intel Innovative Technology Provider Program</label>
            <label><input type="checkbox" name="CheckboxGroup1" onclick="display('#Q1_other')">Other <input id="Q1_other" type="text" /></label>
        </div>
        <hr />
        2. What is your membership account # in above program(s)? <input id="Text1" type="text" />
        <hr />
        3. Monthly Desktop Motherboard Qty Purchased: <input id="Text1" type="text" value="99999" />
        <hr />
        4. Which distributor do you purchase motherboard from?<br />
        <div class="Question">
            <label><input type="checkbox" name="CheckboxGroup1" checked="checked">ASI</label>
            <label><input type="checkbox" name="CheckboxGroup1">Malabs</label>
            <label><input type="checkbox" name="CheckboxGroup1">D&H</label>
            <label><input type="checkbox" name="CheckboxGroup1">Ingram Micro</label>
            <label><input type="checkbox" name="CheckboxGroup1">LeaderTech</label>
            <label><input type="checkbox" name="CheckboxGroup1" onclick="display('#Q4_other')">Other <input id="Q4_other" type="text" /></label>
        </div>
        <hr />
        5. Which Sub-Distributor do you purchase motherboard from?<br />
        <div class="Question">
            <label><input type="checkbox" name="CheckboxGroup1" checked="checked">SED</label>
            <label><input type="checkbox" name="CheckboxGroup1">Bass Computer</label>
            <label><input type="checkbox" name="CheckboxGroup1">Arrow</label>
            <label><input type="checkbox" name="CheckboxGroup1">Avnet</label>
            <label><input type="checkbox" name="CheckboxGroup1">Eastern Data</label>
            <label><input type="checkbox" name="CheckboxGroup1" onclick="display('#Q5_other')">Other <input id="Q5_other" type="text" /></label>
        </div>
        <hr />
        6. I want to receive GIGABYTE’s business newsletter?<br />
        <div class="Question">
            <label><input type="radio" name="RadioGroup1" checked="checked" />Yes</label>
            <label><input type="radio" name="RadioGroup1" />No</label>
        </div>
    </div>
</div>
<div style="margin:30px auto 0 auto; text-align:center;"><input id="Button1" type="button" value="Update" /></div>