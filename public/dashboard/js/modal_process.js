$(document).ready(function() {
    $("button#submit").click(function() {
        var useremail = $('#addsubscriberemail').val();
        var username = $('#addsubscribername').val();
        var usercategory = $('#addsubscribercategory').val();	
	
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!useremail.match(mailformat)) {
            sweetAlert("Oops...", "You have entered an invalid email address!", "error");
            return false;
        }

        if (useremail != '' && username != '' && usercategory != '') {
            $.ajax({
                type: "POST",
                url: "http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/Subscriber/add",
                data: 'name=' + username + '&email=' + useremail + '&category=' + usercategory,
                success: function(message) {
                    if (message == 'ok') {
                        $("#example").modal('hide');
                        swal("Congrats!", username + " added to your subscriber list", "success").then(function() {
                            location.reload();
                        });
                    } else {
                     swal("Oops!", message, "error");
                    }
                },
                error: function() {
                    swal("Oops!", "Something went wrong! Please try again", "error").then(function() {
                        location.reload();
                    });
                }
            });
        } else {
           if (useremail == '') {
                sweetAlert("Oops...", "Email is  required", "error");
            } else if (username == '') {
                sweetAlert("Oops...", "Name is  required", "error");
            } else {
                sweetAlert("Oops...", "Category is  required", "error");
            }
        }
    });

$("button#addcategory").click(function() {
        var category = $('#addnewcategory').val();

        if (category != '') {
            $.ajax({
                type: "POST",
                url: "http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/Category/add",
                data: 'category=' + category,
                success: function(message) {
                    if (message == 'ok') {
                        swal("Congrats!", category + " added to list", "success").then(function() {
                            $('#addsubscribercategory').prepend(`<option value="${category}"> 
                            ${category} 
                       </option>`);
                            var x = document.getElementById("addcategoryform");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }


                        });
                    } else {
                        swal("Oops!", message, "error").then(function() {
                            var x = document.getElementById("addcategoryform");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        });
                    }
                },
                error: function() {
                    swal("Oops!", "Something went wrong! Please try again", "error");
                }
            });
        } else {
            sweetAlert("Oops...", "Category is required", "error");
        }
    });
	
    $("button#submitEdit").click(function() {
       $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        var ID = data[0];
        var subemail = data[2];
        var useremail = $('#subscriberemail' + ID).val();
        var username = $('#subscribername' + ID).val();
        var usercategory = $('#subscribercategory' + ID).val();

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!useremail.match(mailformat)) {
            sweetAlert("Oops...", "You have entered an invalid email address!", "error");
            return false;
        }


        if (useremail != '' && username != '' && usercategory != '') {
            $.ajax({
                type: "POST",
                url: "http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/Subscriber/edit",
                data: 'name=' + username + '&email=' + useremail + '&category=' + usercategory + '&subemail=' + subemail,
                success: function(message) {
                    if (message == 'ok') {
                        $("#example").modal('hide');
                        swal("Congrats!", "Information Successfully Updated", "success").then(function() {
                            location.reload();
                        });
                    } else {
                        swal("Oops!", message, "error");
                    }
                },
                error: function() {
                    swal("Oops!", "Something went wrong! Please try again", "error").then(function() {
                        location.reload();
                    });
                }
            });
        } else {
            if (useremail == '') {
                sweetAlert("Oops...", "Email is  required", "error");
            } else if (username == '') {
                sweetAlert("Oops...", "Name is  required", "error");
            } else {
                sweetAlert("Oops...", "Category is  required", "error");
            }
        }
    });
$("button#category").click(function() {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        console.log(data);
        var ID = data[0];
        var category = $('#newcategory' + ID).val();

        if (category != '') {
            $.ajax({
                type: "POST",
                url: "http://ec2-3-6-171-185.ap-south-1.compute.amazonaws.com/Category/add",
                data: 'category=' + category,
                success: function(message) {
                    if (message == 'ok') {
                        swal("Congrats!", category + " added to list", "success").then(function() {
                            $('#subscribercategory' + ID).prepend(`<option value="${category}"> 
                            ${category} 
                       </option>`);
                            var x = document.getElementById("categoryform" + ID);
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }


                        });
                    } else {
                        swal("Oops!", message, "error").then(function() {
                            var x = document.getElementById("categoryform" + ID);
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                        });
                    }
                },
                error: function() {
                    swal("Oops!", "Something went wrong! Please try again", "error");
                }
            });
        } else {
            sweetAlert("Oops...", "Category is required", "error");
        }
    });
});
