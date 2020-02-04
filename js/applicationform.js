$(document).ready(function () {
    var request;

    var current_fs, next_fs, previous_fs; //forms
    var opacity;
    var current = 1;
    var steps = $("form").length;

    setProgressBar(current);

    $(".next").click(function (event) {
        // alert("working")
        var serializedData;
        var url_string = window.location.href;
        url = new URL(url_string);
        var applicationId = url.searchParams.get("applicationId");
        form_id = event.target.id;
        console.log(form_id)
        current_fs = $(this).parent();
        console.log(current_fs);
        next_fs = $(this).parent().next();
        var form = new FormData($(current_fs)[0]);
        form.append("applicationId", applicationId);
        console.log("Created FormData, " + [...form.keys()].length + " keys in data");

        if (request) {
            request.abort();
        }
        // if (form_id == "form1") {
        var $inputs = current_fs.find("input, select");
        for (var i = 0; i < $inputs.length; i++) {
            var $input = $inputs[i];
            var $inputParent = $($inputs[i]).parent().get(0);
            console.log($inputParent);
            if (!$($inputParent).is(':visible')) {
                console.log("continue");
                continue;
            }
            $inputParentNode = $inputParent.nodeName.toLowerCase();
            var $span = $($input).next();
            if ($input.nodeName.toLowerCase() === 'input') {
                if ($inputParentNode != 'td') {
                    if ($input.type == 'text') {
                        if ($input.value == '') {
                            console.log($span);
                            $($span).removeAttr('hidden');
                            $($input).focus();
                            return;
                        }
                        else {
                            $($span).attr("hidden", true);
                        }
                    } else if ($input.type == 'file') {
                        if ($input.files.length == 0) {
                            $($span).removeAttr('hidden');
                            $($input).focus();
                            return;
                        }
                        else {
                            $($span).attr("hidden", true);
                        }
                    }
                }
                else {
                    console.log("td");
                    $span = $($inputs[i]).parent().parent().parent().parent().next().get(0);
                    console.log($span);
                    console.log($inputParent);
                    if ($input.type == 'text') {
                        if ($input.value == '') {
                            $($span).removeAttr('hidden');
                            $($input).focus();
                            return;
                        }
                        else {
                            $($span).attr("hidden", true);
                        }
                    } else if ($input.type == 'file') {
                        if ($input.files.length == 0) {
                            $($span).removeAttr('hidden');
                            $($input).focus();
                            return;
                        }
                        else {
                            $($span).attr("hidden", true);
                        }
                    }
                }
            }
            else if ($input.nodeName.toLowerCase() === 'select') {
                if ($input.value == '') {
                    $($span).removeAttr('hidden');
                    $($input).focus();
                    return;
                }
                else {
                    $($span).attr("hidden", true);
                }
            }
        }
        if (form_id == "form1") {
            form.append("form", "form1");
        }
        else if (form_id == "form2") {
            form.append("form", "form2");
        }
        else if (form_id == "form3") {
            form.append("form", "form3");
        }
        else if (form_id == "form4") {
            form.append("form", "form4");
        }
        else if (form_id == "form5") {
            form.append("form", "form5");
        }
        else if (form_id == "form6") {
            form.append("form", "form6");
        }
        else if (form_id == "form7") {
            form.append("form", "form7");
        }
        else if (form_id == "form8") {
            form.append("form", "form8");
        }
        console.log(form)
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "./include/applicationsubmission.php",
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // Log a message to the console
            console.log(response);
            //Add Class Active
            $("#progressbar li").eq($("form").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
            console.log("Hooray, it worked!");
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

    });

    $(".previous").click(function () {
        // alert("previous")
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("form").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $(".submit").click(function () {
        return false;
    })

    $('input[type="radio"]').on('click', function () {
        if ($(this).attr('name') == 'holdingCompany') {
            if ($(this).val() == 'yes') {
                $('#holdingCompany').show();
            }
            else {
                $('#holdingCompany').hide();
            }
        } else if ($(this).attr('name') == 'ultimateHolding') {
            if ($(this).val() == 'yes') {
                $('#ultimateHolding').show();
            }
            else {
                $('#ultimateHolding').hide();
            }
        }
        else if ($(this).attr('name') == 'foreignInvest') {
            if ($(this).val() == 'yes') {
                $('#foreignInvest').show();
            }
            else {
                $('#foreignInvest').hide();
            }
        }
    });


    var max_shareholders = 10; //maximum input boxes allowed
    var shareholder_field_Wrapper = $(".input_fields_wrap"); //Fields wrapper
    var share_holder_add_button = $(".add_field_button"); //Add button ID

    var shareholder_boxes = 1; //initlal text box count
    $(share_holder_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (shareholder_boxes < max_shareholders) { //max input box allowed
            shareholder_boxes += 1; //text box increment
            $(share_holder_add_button).before('<div class="newAddedShareholders"><label> No. <span class="shareholderNumber">' + shareholder_boxes + '</span></label> <br><label class="fieldlabels">Name</label>\n' +
                '                            <input type="text" name="nameofshareholder[]">\n' +
                '                            <span hidden="true" style="color:red;">Please Enter ShareHolder name</span>' +
                '                            <label class="fieldlabels">ID Card/Passport Number</label>\n' +
                '                            <input type="text" name="passportnumber[]">\n' +
                '                            <span hidden="true" style="color:red;">Please Enter ID/Passport Number of ShareHolder</span>' +
                '                            <label class="fieldlabels">Attach ID Document</label>\n' +
                '                            <input type="file" name="iddocument[]" accept="image/*">\n' +
                '                            <span hidden="true" style="color:red;">Please Attach the document</span>                ' +
                '                            <label class="fieldlabels">Address</label>\n' +
                '                            <input type="text" name="addressofshareholder[]"><span hidden="true" style="color:red;">Please Enter ShareHolder address</span><a href="#" class="remove_field">Remove</a><br/><br/></div>'); //add input box
        }
    });

    $(shareholder_field_Wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); shareholder_boxes--;
        var shareHolderNo = $('.newAddedShareholders .shareholderNumber');
        for (var i = 0; i < shareHolderNo.length; i++) {
            $(shareHolderNo[i]).html(i + 2);
        }
    })


    var max_Subsidiaries = 10; //maximum input boxes allowed
    var subsidiaries_wrapper = $(".input_fields_wrap3"); //Fields wrapper
    var subsidiaries_add_button = $(".add_field_button3"); //Add button ID

    var subsidiaries = 1; //initlal text box count
    $(subsidiaries_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (subsidiaries < max_Subsidiaries) { //max input box allowed
            subsidiaries++; //text box increment
            $(subsidiaries_add_button).before('<div class="newAddedSubsidaries"><label> No. <span class="SubsidaryNo">' + subsidiaries + '</span></label><br><label class="fieldlabels">Name</label>\n' +
                '                            <input type="text" name="subsidiariesname[]">\n' +
                '                            <label class="fieldlabels">Registration</label>\n' +
                '                            <input type="text" name="subsidiraiesregistration[]">\n' +
                '                            <label class="fieldlabels">Address</label>\n' +
                '                            <input type="text" name="subsidiariesaddress[]"><a href="#" class="remove_field">Remove</a><br/><br/></div>'); //add input box
        }
    });

    $(subsidiaries_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); subsidiaries--;
        var subsidaryNo = $('.newAddedSubsidaries .SubsidaryNo');
        for (var i = 0; i < subsidaryNo.length; i++) {
            $(subsidaryNo[i]).html(i + 2);
        }
    })


    var board_of_director = 10; //maximum input boxes allowed
    var borad_wrapper = $(".input_fields_wrap2"); //Fields wrapper
    var board_add_button = $(".add_field_button2"); //Add button ID

    var boardDirectors = 1; //initlal text box count
    $(board_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (boardDirectors < board_of_director) { //max input box allowed
            boardDirectors++; //text box increment
            $(board_add_button).before('<div class="newAddedDirectors"><label> No. <span class="DirectorNumber">' + boardDirectors + '</span></label><br><label class="fieldlabels">Name</label>\n' +
                '                            <input type="text" name="boardofirector[]">\n' +
                '                            <label class="fieldlabels">ID Card/Passport Number</label>\n' +
                '                            <input type="text" name="directorpassport[]">\n' +
                '                            <label class="fieldlabels">Attach ID Document</label>\n' +
                '                            <input type="file" name="directoriddocument[]" accept="image/*">\n' +
                '                            <label class="fieldlabels">Address</label>\n' +
                '                            <input type="text" name="directoraddress[]"><a href="#" class="remove_field">Remove</a><br/><br/></div>'); //add input box
        }
    });

    $(borad_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); boardDirectors--;
        var directorNo = $('.newAddedDirectors .DirectorNumber');
        for (var i = 0; i < directorNo.length; i++) {
            $(directorNo[i]).html(i + 2);
        }
    })

    var max_document = 10; //maximum input boxes allowed
    var document_wrapper = $(".input_fields_wrap4"); //Fields wrapper
    var document_add_button = $(".add_field_button4"); //Add button ID

    var Otherdocuments = 0; //initlal text box count
    $(document_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (Otherdocuments < max_document) { //max input box allowed
            Otherdocuments++; //text box increment
            $(document_add_button).before('<div class="newAddedDocuments"><label> Other Document No. <span class="DocumentNo">' + (Otherdocuments) + '</span></label>' +
                '<input type="file" name="otherdocuments[]" accept="image/*">' +
                '<a href="#" class="remove_field">Remove</a><br/><br/></div>'); //add input box
        }
    });

    $(document_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); Otherdocuments--;
        var documentNo = $('.newAddedDocuments .DocumentNo');
        for (var i = 0; i < documentNo.length; i++) {
            $(documentNo[i]).html(i + 1);
        }
    })


    var max_foreignCountries = 10; //maximum input boxes allowed
    var foreignCpuntires_wrapper = $(".input_fields_wrap5"); //Fields wrapper
    var country_add_button = $(".add_field_button5"); //Add button ID

    var countries = 1; //initlal text box count
    $(country_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (countries < max_foreignCountries) { //max input box allowed
            countries++; //text box increment
            $(country_add_button).before('<div class="newAddedCountries">' +
                '<select class="browser-default custom-select" class="form-control" name="countryorigin[]">' +
                '<option disabled selected value>Country of Origin for Foreign Shareholder</option>' +
                '<option value="Afganistan">Afghanistan</option>' +
                '<option value="Albania">Albania</option>' +
                '<option value="Algeria">Algeria</option>' +
                '<option value="American Samoa">American Samoa</option>' +
                '<option value="Andorra">Andorra</option>' +
                '<option value="Angola">Angola</option>' +
                '<option value="Anguilla">Anguilla</option>' +
                '<option value="Antigua & Barbuda">Antigua & Barbuda</option>' +
                '<option value="Argentina">Argentina</option>' +
                '<option value="Armenia">Armenia</option>' +
                '<option value="Aruba">Aruba</option>' +
                '<option value="Australia">Australia</option>' +
                '<option value="Austria">Austria</option>' +
                '<option value="Azerbaijan">Azerbaijan</option>' +
                '<option value="Bahamas">Bahamas</option>' +
                '<option value="Bahrain">Bahrain</option>' +
                '<option value="Bangladesh">Bangladesh</option>' +
                '<option value="Barbados">Barbados</option>' +
                '<option value="Belarus">Belarus</option>' +
                '<option value="Belgium">Belgium</option>' +
                '<option value="Belize">Belize</option>' +
                '<option value="Benin">Benin</option>' +
                '<option value="Bermuda">Bermuda</option>' +
                '<option value="Bhutan">Bhutan</option>' +
                '<option value="Bolivia">Bolivia</option>' +
                '<option value="Bonaire">Bonaire</option>' +
                '<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>' +
                '<option value="Botswana">Botswana</option>' +
                '<option value="Brazil">Brazil</option>' +
                '<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>' +
                '<option value="Brunei">Brunei</option>' +
                '<option value="Bulgaria">Bulgaria</option>' +
                '<option value="Burkina Faso">Burkina Faso</option>' +
                '<option value="Burundi">Burundi</option>' +
                '<option value="Cambodia">Cambodia</option>' +
                '<option value="Cameroon">Cameroon</option>' +
                '<option value="Canada">Canada</option>' +
                '<option value="Canary Islands">Canary Islands</option>' +
                '<option value="Cape Verde">Cape Verde</option>' +
                '<option value="Cayman Islands">Cayman Islands</option>' +
                '<option value="Central African Republic">Central African Republic</option>' +
                '<option value="Chad">Chad</option>' +
                '<option value="Channel Islands">Channel Islands</option>' +
                '<option value="Chile">Chile</option>' +
                '<option value="China">China</option>' +
                '<option value="Christmas Island">Christmas Island</option>' +
                '<option value="Cocos Island">Cocos Island</option>' +
                '<option value="Colombia">Colombia</option>' +
                '<option value="Comoros">Comoros</option>' +
                '<option value="Congo">Congo</option>' +
                '<option value="Cook Islands">Cook Islands</option>' +
                '<option value="Costa Rica">Costa Rica</option>' +
                '<option value="Cote DIvoire">Cote DIvoire</option>' +
                '<option value="Croatia">Croatia</option>' +
                '<option value="Cuba">Cuba</option>' +
                '<option value="Curaco">Curacao</option>' +
                '<option value="Cyprus">Cyprus</option>' +
                '<option value="Czech Republic">Czech Republic</option>' +
                '<option value="Denmark">Denmark</option>' +
                '<option value="Djibouti">Djibouti</option>' +
                '<option value="Dominica">Dominica</option>' +
                '<option value="Dominican Republic">Dominican Republic</option>' +
                '<option value="East Timor">East Timor</option>' +
                '<option value="Ecuador">Ecuador</option>' +
                '<option value="Egypt">Egypt</option>' +
                '<option value="El Salvador">El Salvador</option>' +
                '<option value="Equatorial Guinea">Equatorial Guinea</option>' +
                '<option value="Eritrea">Eritrea</option>' +
                '<option value="Estonia">Estonia</option>' +
                '<option value="Ethiopia">Ethiopia</option>' +
                '<option value="Falkland Islands">Falkland Islands</option>' +
                '<option value="Faroe Islands">Faroe Islands</option>' +
                '<option value="Fiji">Fiji</option>' +
                '<option value="Finland">Finland</option>' +
                '<option value="France">France</option>' +
                '<option value="French Guiana">French Guiana</option>' +
                '<option value="French Polynesia">French Polynesia</option>' +
                '<option value="French Southern Ter">French Southern Ter</option>' +
                '<option value="Gabon">Gabon</option>' +
                '<option value="Gambia">Gambia</option>' +
                '<option value="Georgia">Georgia</option>' +
                '<option value="Germany">Germany</option>' +
                '<option value="Ghana">Ghana</option>' +
                '<option value="Gibraltar">Gibraltar</option>' +
                '<option value="Great Britain">Great Britain</option>' +
                '<option value="Greece">Greece</option>' +
                '<option value="Greenland">Greenland</option>' +
                '<option value="Grenada">Grenada</option>' +
                '<option value="Guadeloupe">Guadeloupe</option>' +
                '<option value="Guam">Guam</option>' +
                '<option value="Guatemala">Guatemala</option>' +
                '<option value="Guinea">Guinea</option>' +
                '<option value="Guyana">Guyana</option>' +
                '<option value="Haiti">Haiti</option>' +
                '<option value="Hawaii">Hawaii</option>' +
                '<option value="Honduras">Honduras</option>' +
                '<option value="Hong Kong">Hong Kong</option>' +
                '<option value="Hungary">Hungary</option>' +
                '<option value="Iceland">Iceland</option>' +
                '<option value="Indonesia">Indonesia</option>' +
                '<option value="India">India</option>' +
                '<option value="Iran">Iran</option>' +
                '<option value="Iraq">Iraq</option>' +
                '<option value="Ireland">Ireland</option>' +
                '<option value="Isle of Man">Isle of Man</option>' +
                '<option value="Israel">Israel</option>' +
                '<option value="Italy">Italy</option>' +
                '<option value="Jamaica">Jamaica</option>' +
                '<option value="Japan">Japan</option>' +
                '<option value="Jordan">Jordan</option>' +
                '<option value="Kazakhstan">Kazakhstan</option>' +
                '<option value="Kenya">Kenya</option>' +
                '<option value="Kiribati">Kiribati</option>' +
                '<option value="Korea North">Korea North</option>' +
                '<option value="Korea Sout">Korea South</option>' +
                '<option value="Kuwait">Kuwait</option>' +
                '<option value="Kyrgyzstan">Kyrgyzstan</option>' +
                '<option value="Laos">Laos</option>' +
                '<option value="Latvia">Latvia</option>' +
                '<option value="Lebanon">Lebanon</option>' +
                '<option value="Lesotho">Lesotho</option>' +
                '<option value="Liberia">Liberia</option>' +
                '<option value="Libya">Libya</option>' +
                '<option value="Liechtenstein">Liechtenstein</option>' +
                '<option value="Lithuania">Lithuania</option>' +
                '<option value="Luxembourg">Luxembourg</option>' +
                '<option value="Macau">Macau</option>' +
                '<option value="Macedonia">Macedonia</option>' +
                '<option value="Madagascar">Madagascar</option>' +
                '<option value="Malaysia">Malaysia</option>' +
                '<option value="Malawi">Malawi</option>' +
                '<option value="Maldives">Maldives</option>' +
                '<option value="Mali">Mali</option>' +
                '<option value="Malta">Malta</option>' +
                '<option value="Marshall Islands">Marshall Islands</option>' +
                '<option value="Martinique">Martinique</option>' +
                '<option value="Mauritania">Mauritania</option>' +
                '<option value="Mauritius">Mauritius</option>' +
                '<option value="Mayotte">Mayotte</option>' +
                '<option value="Mexico">Mexico</option>' +
                '<option value="Midway Islands">Midway Islands</option>' +
                '<option value="Moldova">Moldova</option>' +
                '<option value="Monaco">Monaco</option>' +
                '<option value="Mongolia">Mongolia</option>' +
                '<option value="Montserrat">Montserrat</option>' +
                '<option value="Morocco">Morocco</option>' +
                '<option value="Mozambique">Mozambique</option>' +
                '<option value="Myanmar">Myanmar</option>' +
                '<option value="Nambia">Nambia</option>' +
                '<option value="Nauru">Nauru</option>' +
                '<option value="Nepal">Nepal</option>' +
                '<option value="Netherland Antilles">Netherland Antilles</option>' +
                '<option value="Netherlands">Netherlands (Holland, Europe)</option>' +
                '<option value="Nevis">Nevis</option>' +
                '<option value="New Caledonia">New Caledonia</option>' +
                '<option value="New Zealand">New Zealand</option>' +
                '<option value="Nicaragua">Nicaragua</option>' +
                '<option value="Niger">Niger</option>' +
                '<option value="Nigeria">Nigeria</option>' +
                '<option value="Niue">Niue</option>' +
                '<option value="Norfolk Island">Norfolk Island</option>' +
                '<option value="Norway">Norway</option>' +
                '<option value="Oman">Oman</option>' +
                '<option value="Pakistan">Pakistan</option>' +
                '<option value="Palau Island">Palau Island</option>' +
                '<option value="Palestine">Palestine</option>' +
                '<option value="Panama">Panama</option>' +
                '<option value="Papua New Guinea">Papua New Guinea</option>' +
                '<option value="Paraguay">Paraguay</option>' +
                '<option value="Peru">Peru</option>' +
                '<option value="Phillipines">Philippines</option>' +
                '<option value="Pitcairn Island">Pitcairn Island</option>' +
                '<option value="Poland">Poland</option>' +
                '<option value="Portugal">Portugal</option>' +
                '<option value="Puerto Rico">Puerto Rico</option>' +
                '<option value="Qatar">Qatar</option>' +
                '<option value="Republic of Montenegro">Republic of Montenegro</option>' +
                '<option value="Republic of Serbia">Republic of Serbia</option>' +
                '<option value="Reunion">Reunion</option>' +
                '<option value="Romania">Romania</option>' +
                '<option value="Russia">Russia</option>' +
                '<option value="Rwanda">Rwanda</option>' +
                '<option value="St Barthelemy">St Barthelemy</option>' +
                '<option value="St Eustatius">St Eustatius</option>' +
                '<option value="St Helena">St Helena</option>' +
                '<option value="St Kitts-Nevis">St Kitts-Nevis</option>' +
                '<option value="St Lucia">St Lucia</option>' +
                '<option value="St Maarten">St Maarten</option>' +
                '<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>' +
                '<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>' +
                '<option value="Saipan">Saipan</option>' +
                '<option value="Samoa">Samoa</option>' +
                '<option value="Samoa American">Samoa American</option>' +
                '<option value="San Marino">San Marino</option>' +
                '<option value="Sao Tome & Principe">Sao Tome & Principe</option>' +
                '<option value="Saudi Arabia">Saudi Arabia</option>' +
                '<option value="Senegal">Senegal</option>' +
                '<option value="Seychelles">Seychelles</option>' +
                '<option value="Sierra Leone">Sierra Leone</option>' +
                '<option value="Singapore">Singapore</option>' +
                '<option value="Slovakia">Slovakia</option>' +
                '<option value="Slovenia">Slovenia</option>' +
                '<option value="Solomon Islands">Solomon Islands</option>' +
                '<option value="Somalia">Somalia</option>' +
                '<option value="South Africa">South Africa</option>' +
                '<option value="Spain">Spain</option>' +
                '<option value="Sri Lanka">Sri Lanka</option>' +
                '<option value="Sudan">Sudan</option>' +
                '<option value="Suriname">Suriname</option>' +
                '<option value="Swaziland">Swaziland</option>' +
                '<option value="Sweden">Sweden</option>' +
                '<option value="Switzerland">Switzerland</option>' +
                '<option value="Syria">Syria</option>' +
                '<option value="Tahiti">Tahiti</option>' +
                '<option value="Taiwan">Taiwan</option>' +
                '<option value="Tajikistan">Tajikistan</option>' +
                '<option value="Tanzania">Tanzania</option>' +
                '<option value="Thailand">Thailand</option>' +
                '<option value="Togo">Togo</option>' +
                '<option value="Tokelau">Tokelau</option>' +
                '<option value="Tonga">Tonga</option>' +
                '<option value="Trinidad & Tobago">Trinidad & Tobago</option>' +
                '<option value="Tunisia">Tunisia</option>' +
                '<option value="Turkey">Turkey</option>' +
                '<option value="Turkmenistan">Turkmenistan</option>' +
                '<option value="Turks & Caicos Is">Turks & Caicos Is</option>' +
                '<option value="Tuvalu">Tuvalu</option>' +
                '<option value="Uganda">Uganda</option>' +
                '<option value="United Kingdom">United Kingdom</option>' +
                '<option value="Ukraine">Ukraine</option>' +
                '<option value="United Arab Erimates">United Arab Emirates</option>' +
                '<option value="United States of America">United States of America</option>' +
                '<option value="Uraguay">Uruguay</option>' +
                '<option value="Uzbekistan">Uzbekistan</option>' +
                '<option value="Vanuatu">Vanuatu</option>' +
                '<option value="Vatican City State">Vatican City State</option>' +
                '<option value="Venezuela">Venezuela</option>' +
                '<option value="Vietnam">Vietnam</option>' +
                '<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>' +
                '<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>' +
                '<option value="Wake Island">Wake Island</option>' +
                '<option value="Wallis & Futana Is">Wallis & Futana Is</option>' +
                '<option value="Yemen">Yemen</option>' +
                '<option value="Zaire">Zaire</option>' +
                '<option value="Zambia">Zambia</option>' +
                '<option value="Zimbabwe">Zimbabwe</option>' +
                '</select > ' +
                '<a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });

    $(foreignCpuntires_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); countries--;
    })

});

