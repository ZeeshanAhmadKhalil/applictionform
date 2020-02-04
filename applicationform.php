<?php
session_start();
include_once('include/dbController.php');
$db_handle = new DBController();
function customPageHeader()
{
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/applicationform.css">';
}
$pageTitle = 'Application';
include_once('include/header.php');
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Submit your Application</h2>
                <p>Fill all form field to go to next step</p>
                <div id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Personal</strong></li>
                        <li id="personal"><strong>Company</strong></li>
                        <li id="payment" class="shareholder"><strong>Share Holder</strong></li>
                        <li class="boardofdirector"><strong>Board of Director</strong></li>
                        <li class="subsidiaries"><strong>Subsidiaries</strong></li>
                        <li class="attachment"><strong>Attachment</strong></li>
                        <li class="keyemployees"><strong>Key Employees</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> <br> <!-- forms -->
                    <form id="form1" enctype="multipart/form-data">
                        <?php
                            $application_id=$_GET['applicationId'];
                            $query="SELECT applicantName,applicantID,applicantIDType,applicantAddress,applicantCountry,applicantCity,	applicantProvince FROM applicationsubmitted WHERE applicationID='$application_id'";
                            $result=$db_handle->runQuery($query);
                            $applicantName=$result[0]['applicantName'];
                            $applicantProvince=$result[0]['applicantProvince'];
                            $applicantCity=$result[0]['applicantCity'];
                            $applicantCountry=$result[0]['applicantCountry'];
                            $applicantAddress=$result[0]['applicantAddress'];
                            $applicantIDType=$result[0]['applicantIDType'];
                            $applicantID=$result[0]['applicantID'];
                        ?>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 1 - 8</h2>
                                </div>
                            </div> <label class="fieldlabels">Applicant Name </label>
                            <input type="text" name="Applicantname" placeholder="Enter Your Name" value=<?php echo "'$applicantName'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your Name</span>
                            <label class="fieldlabels">ID Of Applicant </label> <input type="text" name="idofapplicant" placeholder="Enter your ID" value=<?php echo "'$applicantID'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your ID</span>
                            <label for="inputidtype">ID Type of Applicant</label>
                            <input type="text" class="form-control" name="ApplicantIdType" placeholder="Enter Your ID Type" value=<?php echo "'$applicantID'" ?>>
                            <span hidden="true" style="color:red;">Please Enter Your ID Type</span>
                            <label for="inputapplicantaddress">Address of Applicant</label>
                            <input type="text" class="form-control" name="ApplicantAddress" placeholder="Address" value=<?php echo "'$applicantAddress'" ?>>
                            <span hidden="true" style="color:red;">Please Enter Your Address</span>
                            <label for="inputcountry">Country</label>
                            <select class="browser-default custom-select" class="form-control" name="ApplicantCountry" value=<?php echo "'$applicantCountry'" ?>>
                            <?php if($applicantCountry!=""){
                                echo "<option>$applicantCountry</option>";
                                    } else{
                                        echo "<option disabled selected value>Select Country</option>";
                                    }
                            ?>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <span hidden="true" style="color:red;">Please Select Your Country</span>
                            <label for="inputprovince">Province</label>
                            <input type="text" class="form-control" name="ApplicantProvince" placeholder="Province" value=<?php echo "'$applicantProvince'" ?>>
                            <span hidden="true" style="color:red;">Please Enter Your Province</span>
                            <label for="inputcity">City</label>
                            <input type="text" class="form-control" name="ApplicantCity" placeholder="City" value=<?php echo "'$applicantCity'" ?>>
                            <span hidden="true" style="color:red;">Please Enter Your City</span>


                        </div>
                        <input type="button" id="form1" name="next" class="next action-button " value="Save & Continue" />
                    </form>
                    <form id="form2" enctype="multipart/form-data">
                        <?php
                            $application_id=$_GET['applicationId'];
                            $query="SELECT ApplicationType,CompanyCity,CompanyProvince,CompanyCountry,CompanyAddress,CorparateRegistrationDocument,CompanyName FROM applicationsubmitted WHERE applicationID='$application_id'";
                            $result=$db_handle->runQuery($query);
                            $CompanyName=$result[0]['CompanyName'];
                            $CorparateRegistrationDocument=$result[0]['CorparateRegistrationDocument'];
                            $CompanyAddress=$result[0]['CompanyAddress'];
                            if($CompanyAddress!=""){
                                $CompanyAddress=explode(',_.',$CompanyAddress);
                                $line1=$CompanyAddress[1];
                                $line2=$CompanyAddress[2];
                            }
                            else {
                                $line1="";
                                $line2="";
                            }
                            $CompanyAddress=$CompanyAddress[0];
                            $CompanyCountry=$result[0]['CompanyCountry'];
                            $CompanyProvince=$result[0]['CompanyProvince'];
                            $CompanyCity=$result[0]['CompanyCity'];
                            $ApplicationType=$result[0]['ApplicationType'];
                            
                        ?>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Company Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 8</h2>
                                </div>
                            </div> <label class="fieldlabels">Company Name *</label>
                            <input type="text" name="CompanyName" placeholder="Company Name" value=<?php echo "'$CompanyName'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your Company Name</span>
                            <label class="fieldlabels">Attach Corparate Registration Document</label>
                            <input type="file" accept="image/x-png,image/gif,image/jpeg,application/pdf" name="attachedcorparateregistration" id="attachedcorparateregistration" placeholder="Upload Your File" value=<?php echo "'$CorparateRegistrationDocument'" ?>>
                            <span hidden="true" style="color:red;">Please attach your Company registration document</span>
                            <label class="fieldlabels">Company Address *</label>
                            <input type="text" name="companyaddress[]" placeholder="Company Address" value=<?php echo "'$CompanyAddress'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your Company Address</span>
                            <label class="fieldlabels">Line 1 *</label>
                            <input type="text" name="companyaddress[]" placeholder="Line 1" value=<?php echo "'$line1'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your Address Line 1</span>
                            <label class="fieldlabels">Line 2*</label>
                            <input type="text" name="companyaddress[]" placeholder="Line 2" value=<?php echo "'$line2'" ?>/>
                            <span hidden="true" style="color:red;">Please Enter Your Address Line 2</span>
                            <label for="inputcountry">Country</label>
                            <select class="browser-default custom-select" class="form-control" name="companycountry">
                                <?php
                                    if($CompanyCountry==""){
                                        echo "<option disabled selected value>Select Country</option>";
                                    }
                                    else{
                                        echo "<option>$CompanyCountry</option>";
                                    }
                                ?>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <span hidden="true" style="color:red;">Please Enter the Country of the Company</span>
                            <label for="inputprovince">Province</label>
                            <input type="text" class="form-control" id="companyprovince" name="companyprovince" placeholder="Province" value=<?php echo "'$CompanyProvince'" ?>>
                            <span hidden="true" style="color:red;">Please Enter the Province of the Company</span>
                            <label for="inputcity">City</label>
                            <input type="text" class="form-control" id="companycity" name="companycity" placeholder="City" value=<?php echo "'$CompanyCity'" ?>>
                            <span hidden="true" style="color:red;">Please Enter the City of the Company </span>
                            <label class="fieldlabels">Type Of Application</label><br>
                            <select class="browser-default custom-select" name="ApplicationType">
                                <?php
                                    if($ApplicationType==""){
                                        echo "<option disabled selected value>Select Application Type</option>";
                                    }
                                    else{
                                        echo "<option>$ApplicationType</option>";
                                    }
                                ?>
                                <option value="1">Application Type 1</option>
                                <option value="2">Application Type 2</option>
                                <option value="3">Application Type 3</option>
                            </select>
                            <span hidden="true" style="color:red;">Please Select Your Application Type</span>
                        </div> <input id="form2" type="button" name="next" class="next action-button" value="Save & Continue" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>
                    <?php
                            $application_id=$_GET['applicationId'];
                            $query="SELECT ShareHolderAddresses,ShareHolderIDDocument,ShareHolderIDs,ShareHolderNames FROM applicationsubmitted WHERE applicationID='$application_id'";
                            $result=$db_handle->runQuery($query);
                            $ShareHolderNames=$result[0]['ShareHolderNames'];
                            $ShareHolderIDs=$result[0]['ShareHolderIDs'];
                            $ShareHolderIDDocument=$result[0]['ShareHolderIDDocument'];
                            $ShareHolderAddresses=$result[0]['ShareHolderAddresses'];
                    ?>
                    <form id="form3" enctype="multipart/form-data">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Share Holder Details</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 8</h2>
                                </div>
                            </div>
                            <?php
                                $ShareHolderNames=explode(",_.",$ShareHolderNames);
                                $ShareHolderIDs=explode(",_.",$ShareHolderIDs);
                                $ShareHolderIDDocument=explode(",_.",$ShareHolderIDDocument);
                                $ShareHolderAddresses=explode(",_.",$ShareHolderAddresses);
                                for($i=0;$i<count($ShareHolderAddresses);$i++):
                            ?>
                            <label> No. <?php $j=$i+1;echo "$j"; ?></label><br>
                            <label class="fieldlabels">Name</label>
                            <input type="text" name="nameofshareholder[]" value=<?php echo "'$ShareHolderNames[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter ShareHolder name</span>
                            <label class="fieldlabels">ID Card/Passport Number</label>
                            <input type="text" name="passportnumber[]" value=<?php echo "'$ShareHolderIDs[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter ID/Passport Number of ShareHolder</span>
                            <label class="fieldlabels">Attach ID Document</label>
                            <input type="file" name="iddocument[]" accept="image/*">
                            <span hidden="true" style="color:red;">Please Attach the document</span>
                            <label class="fieldlabels">Address</label>
                            <input type="text" name="addressofshareholder[]" value=<?php echo "'$ShareHolderAddresses[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter ShareHolder address</span>
                                <?php endfor; ?>
                            <div class="input_fields_wrap">
                                <button class="add_field_button btn btn-primary">Add More Share Holder</button>
                            </div>
                        </div> <input id="form3" type="button" name="next" class="next action-button" value="Save & Continue" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>
                    <form id="form4" enctype="multipart/form-data">
                        <?php
                            $application_id=$_GET['applicationId'];
                            $query="SELECT UltimateHoldingComapnyAddress,UltimateHoldingComapnyRegNo,UltimateHoldingComapnyName,UltimateHoldingComapny,HoldingCompanyAddress,HoldingCompanyRegNo,HoldingCompanyName,HoldingCompany,BoardDirectorAddresses,BoardDirectorIDDocuments,BoardDirectorIDs,BoardDirectorNames FROM applicationsubmitted WHERE applicationID='$application_id'";
                            $result=$db_handle->runQuery($query);
                            $UltimateHoldingComapnyAddress=$result[0]['UltimateHoldingComapnyAddress'];
                            $UltimateHoldingComapnyRegNo=$result[0]['UltimateHoldingComapnyRegNo'];
                            $UltimateHoldingComapnyName=$result[0]['UltimateHoldingComapnyName'];
                            $UltimateHoldingComapny=$result[0]['UltimateHoldingComapny'];
                            $HoldingCompanyAddress=$result[0]['HoldingCompanyAddress'];
                            $HoldingCompanyRegNo=$result[0]['HoldingCompanyRegNo'];
                            $HoldingCompanyName=$result[0]['HoldingCompanyName'];
                            $HoldingCompany=$result[0]['HoldingCompany'];
                            $BoardDirectorAddresses=$result[0]['BoardDirectorAddresses'];
                            $BoardDirectorIDDocuments=$result[0]['BoardDirectorIDDocuments'];
                            $BoardDirectorIDs=$result[0]['BoardDirectorIDs'];
                            $BoardDirectorNames=$result[0]['BoardDirectorNames'];
                        ?>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Board of Director Details</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 8</h2>
                                </div>
                            </div>
                            <?php
                                $BoardDirectorNames=explode(",_.",$BoardDirectorNames);
                                $BoardDirectorAddresses=explode(",_.",$BoardDirectorAddresses);
                                $BoardDirectorIDs=explode(",_.",$BoardDirectorIDs);
                                for($i=0;$i<count($BoardDirectorNames);$i++):
                            ?>
                            <label> No. <?php $j=$i+1;echo "$j"; ?></label> <br>
                            <label>Chairman of the Board</label><br>
                            <label class="fieldlabels">Name</label>
                            <input type="text" name="boardofirector[]" value=<?php echo "'$BoardDirectorNames[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter Chairman of the Board name</span>
                            <label class="fieldlabels">ID Card/Passport Number</label>
                            <input type="text" name="directorpassport[]" value=<?php echo "'$BoardDirectorIDs[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter ID/Passport Number of the Chairman of the Board</span>
                            <label class="fieldlabels">Attach ID Document</label>
                            <input type="file" name="directoriddocument[]" accept="image/*">
                            <span hidden="true" style="color:red;">Please Attach document of the Chairman of the Board</span>
                            <label class="fieldlabels">Address</label>
                            <input type="text" name="directoraddress[]" value=<?php echo "'$BoardDirectorAddresses[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter Address of the Chairman of the Board</span>
                                <?php endfor; ?>
                            <div class="input_fields_wrap2">
                                <button class="add_field_button2 btn btn-primary">Add More Board of Director</button>
                            </div>
                            <container class="radiobuttton">
                                <h5>Is there is Holding Company??</h5>
                                <?php
                                    if($HoldingCompany==0){
                                        echo'
                                        <input type="radio" id="r1" name="holdingCompany" value="yes" />
                                        <label for="Yes">Yes</label>
                                        <input type="radio" id="r2" name="holdingCompany" value="no" checked="checked" />
                                        <label for="No">No</label>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <input type="radio" id="r1" name="holdingCompany" value="yes" checked="checked"/>
                                        <label for="Yes">Yes</label>
                                        <input type="radio" id="r2" name="holdingCompany" value="no" />
                                        <label for="No">No</label>
                                        ';
                                    }
                                ?>
                            </container>
                            <br />


                            <div class="text" id="holdingCompany" <?php if($HoldingCompany==0){echo 'style="display:none"';} ?>>
                                <input type="text" name="companyname" id="text2" maxlength="30" placeholder="Enter Name " value=<?php echo "'$HoldingCompanyName'"?>>
                                <span hidden="true" style="color:red;">Please Enter the name of Holding Company</span>
                                <input type="text" name="registration" id="text2" maxlength="30" placeholder=" Enter Registration" value=<?php echo "'$HoldingCompanyRegNo'"?>>
                                <span hidden="true" style="color:red;">Please Enter Registration number of Holding Company</span>
                                <input type="text" name="Address" id="text2" maxlength="30" placeholder=" Enter Address" value=<?php echo "'$HoldingCompanyAddress'"?>>
                                <span hidden="true" style="color:red;">Please Enter Address of the Holding Company</span>
                            </div>
                            <br>
                            <container class="radiobuttton">
                                    <?php
                                        if($UltimateHoldingComapny==0){
                                            echo '
                                            <h5>Ultimate Holding Comapny??</h5>
                                            <input type="radio" id="r3" name="ultimateHolding" value="yes" />
                                            <label for="Yes">Yes</label>
                                            <input type="radio" id="r4" name="ultimateHolding" value="no" checked="checked" />
                                            <label for="No">No</label>
                                            ';
                                        }
                                        else{
                                            echo '
                                            <h5>Ultimate Holding Comapny??</h5>
                                            <input type="radio" id="r3" name="ultimateHolding" value="yes"checked="checked" />
                                            <label for="Yes">Yes</label>
                                            <input type="radio" id="r4" name="ultimateHolding"  value="no" />
                                            <label for="No">No</label>
                                            ';
                                        }
                                    ?>
                                
                            </container>
                            <br />


                            <div class="text2" id="ultimateHolding" <?php if($UltimateHoldingComapny==0){echo 'style="display:none"';} ?>>
                                <input type="text" name="UltimateHoldingcompanyname" id="text2" maxlength="30" placeholder="Enter Name " value=<?php echo "'$UltimateHoldingComapnyName'"?>>
                                <span hidden="true" style="color:red;">Please Enter Name of the Ultimate Holding Company</span>
                                <input type="text" name="UltimateHoldingregistration" id="text2" maxlength="30" placeholder=" Enter Registration" value=<?php echo "'$UltimateHoldingComapnyRegNo'"?>>
                                <span hidden="true" style="color:red;">Please Enter Registration Number of the Ultimate Holding Company</span>
                                <input type="text" name="UltimateHoldingAddress" id="text2" maxlength="30" placeholder=" Enter Address" value=<?php echo "'$UltimateHoldingComapnyAddress'"?>>
                                <span hidden="true" style="color:red;">Please Enter Address of the Ultimate Holding Company</span>
                            </div>


                        </div> <input id="form4" type="button" name="next" class="next action-button" value="Save & Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>
                    <form id="form5">
                    <?php
                            $application_id=$_GET['applicationId'];
                            $query="SELECT ForiegnInvestOriginCountry,PercentageForeignShare,foreignInvest,NoOfShares,ShareCapital,NumberOfEmployess,SubsidiariesAddresses,SubsidiariesReg,SubsidiariesNames FROM applicationsubmitted WHERE applicationID='$application_id'";
                            $result=$db_handle->runQuery($query);
                            $SubsidiariesNames=$result[0]['SubsidiariesNames'];
                            $SubsidiariesReg=$result[0]['SubsidiariesReg'];
                            $SubsidiariesAddresses=$result[0]['SubsidiariesAddresses'];
                            $NumberOfEmployess=$result[0]['NumberOfEmployess'];
                            $ShareCapital=$result[0]['ShareCapital'];
                            $NoOfShares=$result[0]['NoOfShares'];
                            $foreignInvest=$result[0]['foreignInvest'];
                            $PercentageForeignShare=$result[0]['PercentageForeignShare'];
                            $ForiegnInvestOriginCountry=$result[0]['ForiegnInvestOriginCountry'];
                        ?>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">List of Subsidiaries</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 5 - 8</h2>
                                </div>
                            </div>
                            <?php
                                $SubsidiariesAddresses=explode(",_.",$SubsidiariesAddresses);
                                $SubsidiariesReg=explode(",_.",$SubsidiariesReg);
                                $SubsidiariesNames=explode(",_.",$SubsidiariesNames);
                                for($i=0;$i<count($SubsidiariesAddresses);$i++):
                            ?>
                            <label> No. <?php $j=$i+1;echo "$j"; ?></label> <br>
                            <label class="fieldlabels">Name</label>
                            <input type="text" name="nameofsubsidiaries[]" value=<?php echo "'$SubsidiariesNames[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter Name of the Subsidiary</span>
                            <label class="fieldlabels">Registration</label>
                            <input type="text" name="subsidiariesregistration[]" value=<?php echo "'$SubsidiariesReg[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter Registrattion Number of the Subsidiary</span>
                            <label class="fieldlabels">Address</label>
                            <input type="text" name="addressofsubsidiaries[]" value=<?php echo "'$SubsidiariesAddresses[$i]'"?>>
                            <span hidden="true" style="color:red;">Please Enter Address of the Subsidiary</span>
                                <?php endfor; ?>
                            <div class="input_fields_wrap3">
                                <button class="add_field_button3 btn btn-primary">Add More Subsidiaries</button>
                            </div>
                            <label style="margin-top: 20px" class="fieldlabels">Number of Employess in the Company*</label>
                            <input type="text" name="noofemployees" placeholder="No. of Employees" value=<?php echo "'$NumberOfEmployess'"?>/>
                            <span hidden="true" style="color:red;">Please Enter Number of Employees in Your Company</span>
                            <label class="fieldlabels">Share Capital</label>
                            <input type="text" name="sharecapital" placeholder="Enter Share Capital" value=<?php echo "'$ShareCapital'"?>>
                            <span hidden="true" style="color:red;">Please Enter Share Capital Your Company</span>
                            <label class="fieldlabels">No of Shares *</label>
                            <input type="text" name="noofshares" placeholder="Enter No of Shares" value=<?php echo "'$NoOfShares'"?>/>
                            <span hidden="true" style="color:red;">Please Enter Number of Shares in Your Company</span>
                            <container class="radiobuttton">
                                        <?php
                                            if($foreignInvest==0){
                                                echo '
                                                <h5>Is there is foreign Invest??</h5>
                                                <input type="radio" id="r5" name="foreignInvest" value="yes" />
                                                <label for="Yes">Yes</label>
                                                <input type="radio" id="r6" name="foreignInvest" checked="checked" value="no" />
                                                <label for="No">No</label>
                                                ';
                                            }else{
                                                echo '
                                                <h5>Is there is foreign Invest??</h5>
                                                <input type="radio" id="r5" name="foreignInvest" checked="checked" value="yes" />
                                                <label for="Yes">Yes</label>
                                                <input type="radio" id="r6" name="foreignInvest" value="no" />
                                                <label for="No">No</label>
                                                ';
                                            }
                                        ?>
                            </container>
                            <br />


                            <div class="text3" id="foreignInvest" <?php if($foreignInvest==0){echo "style='display: none'";} ?>>
                                <input type="text" name="percentForiegnShare" id="text2" maxlength="30" placeholder=" Enter % Of Foreign Share " value=<?php echo "'$PercentageForeignShare'"?>>
                                <span hidden="true" style="color:red;">Please Enter Percentage of Foriegn Share in Your Company</span>
                                
                                    <?php
                                        if($ForiegnInvestOriginCountry==""){
                                            echo '<select class="browser-default custom-select" class="form-control" name="countryorigin[]">
                                            <option disabled selected value>Country of Origin for Foreign Shareholder</option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote DIvoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                            ';
                                        }else{
                                            $ForiegnInvestOriginCountry=explode(",_.",$ForiegnInvestOriginCountry);
                                            for($i=0;$i<count($ForiegnInvestOriginCountry);$i++){
                                                echo '
                                                <select class="browser-default custom-select" class="form-control" name="countryorigin[]">
                                                <option>'.$ForiegnInvestOriginCountry[$i].'</option>
                                                <option value="Afganistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire">Bonaire</option>
                                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Island">Cocos Island</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote DIvoire">Cote DIvoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaco">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Ter">French Southern Ter</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="India">India</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea Sout">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Nambia">Nambia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau Island">Palau Island</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Phillipines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Maarten">St Maarten</option>
                                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uraguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                                ';
                                            }
                                        }
                                    ?>
                                    
                                <span hidden="true" style="color:red;">Please Select the Origin Country of Foriegn Share</span>
                                <br />
                                <div class="input_fields_wrap5">
                                    <button class="add_field_button5 btn btn-primary">Add More Countries</button>
                                </div>
                            </div>

                            <br>
                        </div> <input id="form5" type="button" name="next" class="next action-button btn btn-primary" value="Save & Continue" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>
                    <form id="form6">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Attachment</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 6 - 8</h2>
                                </div>
                            </div><br />
                            <label class="fieldlabels">Memorandom of Association</label>
                            <input type="file" name="memorandomofassociation" accept="image/*">
                            <span hidden="true" style="color:red;">Please Attach Memorandom of Association </span>
                            <label class="fieldlabels">Articles of Association</label>
                            <input type="file" name="articlesofassociation" accept="image/*">
                            <span hidden="true" style="color:red;">Please Attach Articles of Association </span>
                            <div class="input_fields_wrap4">
                                <button class="add_field_button4 btn btn-primary">Add More Documents</button>
                            </div>
                        </div> <input id="form6" type="button" name="next" class="next action-button" value="Save & Continue" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>


                    <form id="form7">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Key Employees Details</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 7 - 8</h2>
                                </div>
                            </div>

                            <table>
                                <label>Chief Executive Officer</label>
                                <tr>
                                    <td><input type="text" name="ceoname" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="ceoid" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="ceoidtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="file" name="ceoattachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <span hidden="true" style="color:red;">CEO details must be filled completely</span><br />
                            <table>
                                <label>Chief Operating Officer</label>
                                <tr>
                                    <td><input type="text" name="cooname" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="cooid" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="cooidtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="file" name="cooattachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <span hidden="true" style="color:red;">COO details must be filled completely</span><br />
                            <table>
                                <label>Head of Internal Audit</label>
                                <tr>
                                    <td><input type="text" name="hianame" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="hiaid" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="hiaidtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="file" name="hiaattachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <span hidden="true" style="color:red;">HOIA details must be filled completely</span><br />
                            <table>
                                <label>Head of Risk</label>
                                <tr>
                                    <td><input type="text" name="hrname" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="hrid" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="hridtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="file" name="hrattachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <span hidden="true" style="color:red;">HOR details must be filled completely</span><br />
                            <!-- <table>
                                <label>Other Key Employee 1</label>
                                <tr>
                                    <td><input type="text" name="employee1name" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="employee1id" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="employee1idtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="text" name="employee1attachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <table>
                                <label>Other Key Employee 2</label>
                                <tr>
                                    <td><input type="text" name="employee2name" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="employee2id" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="employee2idtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="text" name="employee2attachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table>
                            <table>
                                <label>Other Key Employee 3</label>
                                <tr>
                                    <td><input type="text" name="employee3name" placeholder="Enter Name" /></td>
                                    <td><input type="text" name="employee3id" placeholder="Enter ID" /></td>
                                    <td><input type="text" name="employee3idtype" placeholder="Enter ID Type" /></td>
                                    <td><input type="text" name="employee3attachid" placeholder="Attach ID" /></td>
                                </tr>
                            </table> -->

                        </div> <input id="form7" type="button" name="next" class="next action-button" value="Save & Continue" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </form>



                    <form id="form8">
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 8 - 8</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Submitted </h5>
                                    <a href="dashboard.php" class="action-button">Goto Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
function customPageFooter()
{
    echo '<script src="js/applicationform.js"></script>';
}
include_once('include/footer.php');
?>