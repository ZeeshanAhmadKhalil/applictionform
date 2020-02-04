$(document).ready(function () {
    var url_string = window.location.href;
    url = new URL(url_string);
    var applicationID = url.searchParams.get("applicationID");
    // var data = "username=" + username;
    request = $.ajax({
        url: './include/getApplicationdetails.php',
        type: "POST",
        data: {
            id: applicationID
        }
    })

    request.done(function (response, textStatus, jqXHR) {
        var obj = JSON.parse(response);
        console.log(obj);
        // console.log(response)
        console.log(obj['ceodetails']);
        $("#applicantName").html(obj['applicantName']);
        $("#IDOfApplicant").html(obj['applicantid']);
        $("#IDTypeOfApplicant").html(obj['applicationidtype']);
        $("#AddressOfApplicant").html(obj['applicantaddress']);
        $("#ApplicantCountry").html(obj['applicantcountry']);
        $("#ApplicantProvince").html(obj['applicantprovince']);
        $("#ApplicantCity").html(obj['applicantcity']);
        $("#companyName").html(obj['companyname']);

        var CorporateButton = '<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="' + obj['corporateregistrationdocument'] + '">View Document</button>'
        $("#corporateRegistrationDocument").html(CorporateButton);
        // $('#corporateRegistrationDocument button').attr("data-url", obj['corporateregistrationdocument']);
        $("#companyAddress").html(obj['companyaddress']);
        $("#companycountry").html(obj['companycountry']);
        $("#companyProvince").html(obj['companyprovince']);
        $("#companycity").html(obj['companycity']);
        $("#NoOfEmployees").html(obj['noofemployees']);
        $("#NoOfShares").html(obj['noofshares']);
        $("#ShareCapital").html(obj['sharecapital']);
        $("#foriegnInvestment").html('Percentage : ' + obj['percentageforiegninvest'] + ',Investor Origin Country : ' + obj['foriegninvestorigincountry']);
        $("#holdingCompanyDetails").html(obj['holdingcompanyname'] + '\n' + obj['holdingcompanyregno'] + '\n' + obj['holdingcompanyaddress']);
        $("#UltimateHoldingCompanyDetails").html(obj['utlimateholdingcompanyname'] + '\n' + obj['utlimateholdingcompanyregno'] + '\n' + obj['utlimateholdingcompanyaddress']);
        $("#shareHolderNames").html(obj['shareholdername']);
        $("#shareHolderPassportNumbers").html(obj['shareholderid']);
        paths=[]
        paths=obj['shareholderiddocuments'].split(",_.")
        // alert(paths[1])
        $("#shareHolderPassportdocument").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + paths[0] + '">View Document</button>'); 
        for(i=1;i<paths.length;i++){
            $("#shareHolderPassportdocument").append('<br><br><button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + paths[i] + '">View Document</button>');
        }
        $("#shareHolderAddres").html(obj['shareholderaddresses']);
        $("#directorNames").html(obj['boarddirectornames']);
        $("#directorIDNumbers").html(obj['boarddirectorids']);
        paths=obj['boarddirectoriddocuments'].split(",_.")
        $("#directorIDDocuments").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + paths[0] + '">View Document</button>');
        for(i=1;i<paths.length;i++){
            $("#directorIDDocuments").append('<br><br><button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + paths[i] + '">View Document</button>');
        }
        $("#directorAddress").html(obj['boarddirectoraddresses']);
        $("#subsidariesNames").html(obj['subsidiariesnames']);
        $("#subsidariesRegistration").html(obj['subsidiariesregno']);
        $("#subsidariesAddress").html(obj['subsidiariesaddresses']);
        $("#memorandomAttachment").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + obj['memorandomattachment'] + '">View Document</button>');
        $("#ArticlesAttachment").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + obj['associationarticles'] + '">View Document</button>');
        paths=[]
        if(obj['otherattachments']!=null)
        paths=obj['otherattachments'].split(",_.")
        $("#OtherdocumentsAttachment").html('')
        for(i=0;i<paths.length;i++){
            $("#OtherdocumentsAttachment").append('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="ApplicationSubmission_Project-master/' + paths[i] + '">View Document</button><br><br>');
        }
        var ceodetails = obj['ceodetails'];
        ceodetails = ceodetails.split(",");
        var coodetails = obj['coodetails'];
        coodetails = coodetails.split(",");
        var hoiadetails = obj['hoiadetails'];
        hoiadetails = hoiadetails.split(",");
        var hordetails = obj['hordetails'];
        hordetails = hordetails.split(",");
        $("#ceoName").html(ceodetails[0]);
        $("#ceoRegistration").html(ceodetails[1]);
        $("#ceoAddress").html(ceodetails[2]);
        path=ceodetails[3].replace("_.","")
        $("#ceoIdDocument").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="' + path + '">View Document</button>');
        $("#cooName").html(coodetails[0]);
        $("#cooRegistration").html(coodetails[1]);
        $("#cooAddress").html(coodetails[2]);
        path=coodetails[3].replace("_.","")
        $("#cooIdDocument").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="' + path + '">View Document</button>');
        $("#HiaName").html(hoiadetails[0]);
        $("#HiaRegistration").html(hoiadetails[1]);
        $("#HiaAddress").html(hoiadetails[2]);
        path=hoiadetails[3].replace("_.","")
        $("#HiaIdDocument").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="' + path + '">View Document</button>');
        $("#hordetails").html(hordetails[0]);
        $("#horRegistration").html(hordetails[1]);
        $("#horAddress").html(hordetails[2]);
        path=hordetails[3].replace("_.","")
        $("#horIdDocument").html('<button  id="CorporateButton" type="button" class="btn btn-primary viewdocument"  data-url="' + path + '">View Document</button>');

    });
    $('#accordion, #bs-collapse')
        .on('show.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').addClass('active');
        })
        .on('hide.bs.collapse', function (a) {
            $(a.target).prev('.panel-heading').removeClass('active');
        });

    $(document).on('click', 'button.viewdocument', function (event) {
        event.preventDefault();
        console.log("click");
        var url = 'http://localhost/ApplicationSubmission_Project-master/' + $(this).attr('data-url');
        $(".modal-footer a").attr('href', url);
        $("#modalbody img").attr('src', url)
        $("#modalIMG").modal('show');
    })
});