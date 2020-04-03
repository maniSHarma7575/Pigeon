function mySearch() {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myCampaign");
    filter = input.value.toUpperCase();
    table = document.getElementById("myCampaignTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function myFunction() {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


function myCategory() {
    var x = document.getElementById("addcategoryform");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function displayInfo() {
    swal("Important Note!", "You can't use this service without AmazonSES email verification, For using this service contact Pigeon team.").then(function() {
        window.location = "http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/campaign/launch?service=amazonses";
    });
}
function displayCategory(ID) {
    var x = document.getElementById("categoryform" + ID);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
