// JavaScript Document
function show_success(text)
    {
		new PNotify({ title: "Message!", text: text, type: "success" });
    }
function show_danger(text)
    {
		new PNotify({ title: "Message!", text: text, type: "error" });
	}
function handleEnter(e) {
  if(e.keyCode === 13){
      login()
  }
}

function login()
	{

		var  username= document.getElementById('username').value;
		if(username=="")
	{
		show_danger("Please Enter Your Username");
		document.getElementById('username').focus();
		return false;
	}

 if(!username.match (/^[A-Za-z]+$/))
      	{
     	show_danger("Use Valid Username");
      	return false;
      	}
      
		var  password= document.getElementById('password').value;
		if(password=="")
		{
		show_danger("Please Enter Your Password");
		document.getElementById('password').focus();
		return false;
		}
		$.post("login.php",{username:username,password:password},function(data){
	    $("#login").html(data);});	
		}

function add_chapter()
	{
	
		var  cgerman= document.getElementById('cgerman').value;
		if(cgerman=="")
		{
		show_danger("Please Enter Chapter Name (German)");
		document.getElementById('cgerman').focus();
		return false;
		}
   
		var  cenglish= document.getElementById('cenglish').value;
		if(cenglish=="")
		{
			show_danger("Please Enter Chapter Name (English)");
			document.getElementById('cenglish').focus();
			return false;
		}
		var  curdu= document.getElementById('curdu').value;
		if(curdu=="")
		{
			show_danger("Please Enter Chapter Name (Urdu)");
			document.getElementById('curdu').focus();
			return false;
		}
		var myform = document.getElementById("chapterform");
		var fd = new FormData(myform);
		$.ajax({
		url: "chapters/add_chapter.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#chapterform').trigger("reset");
		$("#cModal").modal("hide");
		$("#Achapter").html(dataofconfirm);
			reload_chapter();
			
			
			
		}
		
		});
				
	}

function reload_chapter()
{
	
      $.ajax({    //create an ajax request
        type: "GET",
        url: "chapters/view_chapter.php",            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#getchapter").html(''); 
            $("#getchapter").html(response); 
			
			$('#dataTable').DataTable();
            //alert(response);
        }

   
});

}


function delete_chapter(id=0)
{
	$.ajax({
			url: "chapters/delete_chapter.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deleteModal_body").html(data);

				$("#deleteModal").modal("show");
				
			}
			});
}

function edit_chapter(id=0){	
			$.ajax({
			url: "chapters/edit_chapter.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#dModal_body").html(data);

				$("#deModal").modal("show");
			}
			});
}

function deleteconfirm_chapter(id)
{
 	var myform2 = document.getElementById("deletechapter");
		var fd = new FormData(myform2);
		$.ajax({
		url: "chapters/deleteconfirm.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#deletechapter').trigger("reset");
		$("#deleteModal").modal("hide");
		$("#deletconfirmchapter").html(dataofconfirm);
			reload_chapter();
			
			
		}
		
		});
}


function update_chapter(id){
	
		//editchapter
		var myform1 = document.getElementById("editchapter");
		var fd = new FormData(myform1);
		$.ajax({
		url: "chapters/update_chapter.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#editchapter').trigger("reset");
		$("#deModal").modal("hide");
		$("#updatechapter").html(dataofconfirm);
			reload_chapter();
			$('#dataTable').DataTable();
		}
		});
}
function add_topic()
	{
		var  cid= document.getElementById('cid').value;
		if(cid=="")
		{
		show_danger("Please Select Chapter");
		document.getElementById('cid').focus();
		return false;
		}
		var  tgerman= document.getElementById('tgerman').value;
		if(tgerman=="")
		{
		show_danger("Please Enter Topic Name (German)");
		document.getElementById('tgerman').focus();
		return false;
		}
   
		var  tenglish= document.getElementById('tenglish').value;
		if(tenglish=="")
		{
			show_danger("Please Enter Topic Name (English)");
			document.getElementById('tenglish').focus();
			return false;
		}
		var  turdu= document.getElementById('turdu').value;
		if(turdu=="")
		{
			show_danger("Please Enter Topic Name (Urdu)");
			document.getElementById('turdu').focus();
			return false;
		}
		var myform = document.getElementById("topicform");
		var fd = new FormData(myform);
		$.ajax({
		url: "topics/add_topic.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#topicform').trigger("reset");
		$("#tModal").modal("hide");
		$("#Atopic").html(dataofconfirm);
			reload_topic();
			
			
			
		}
		
		});
				
	}
 function reload_topic()
{
	
      $.ajax({    //create an ajax request
        type: "GET",
        url: "topics/view_topic.php",            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#gettopic").html(''); 
            $("#gettopic").html(response); 
			
			$('#dataTable').DataTable();
            //alert(response);
        }

   
});
}
function delete_topic(id=0)
{
	$.ajax({
			url: "topics/delete_topic.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deletetopic_body").html(data);

				$("#deletetopicModal").modal("show");
				
			}
			});
}

function edit_topic(id=0){	
			$.ajax({
			url: "topics/edit_topic.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#editModal_body").html(data);

				$("#editModal").modal("show");
			}
			});
}

function deleteconfirm_topic(id)
{
 	var myform2 = document.getElementById("deletetopic");
		var fd = new FormData(myform2);
		$.ajax({
		url: "topics/deleteconfirm.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#deletetopic').trigger("reset");
		$("#deletetopicModal").modal("hide");
		$("#deletconfirmtopic").html(dataofconfirm);
			reload_topic();
			
			
		}
		
		});
}


function update_topic(id){
	
		//edittopic
		var myform1 = document.getElementById("edit_topic1");
		var fd = new FormData(myform1);
		$.ajax({
		url: "topics/update_topic.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#edit_topic1').trigger("reset");
		$("#editModal").modal("hide");
		$("#updatetopic").html(dataofconfirm);
			reload_topic();
			$('#dataTable').DataTable();
		}
		});
}

function get_topic() {
                jQuery.ajax({
                    url: "get_topic.php",
                    data:'cid='+$("#cidq").val(),
                    type: "POST",
                    success:function(data){
                       $("#checktopic").html(data);
                      
                    },
                    error:function (){}
                });
            }

function add_question()
	{
		var  catid= document.getElementById('catid').value;
		if(catid=="")
		{
		show_danger("Please Select Category");
		document.getElementById('catid').focus();
		return false;
		}
		
		var  qgerman= document.getElementById('qgerman').value;
		if(qgerman=="")
		{
		show_danger("Please Enter Question (German)");
		document.getElementById('qgerman').focus();
		return false;
		}
   
		var  qenglish= document.getElementById('qenglish').value;
		if(qenglish=="")
		{
			show_danger("Please Enter Question (English)");
			document.getElementById('qenglish').focus();
			return false;
		}
		var  qurdu= document.getElementById('qurdu').value;
		if(qurdu=="")
		{
			show_danger("Please Enter Question (Urdu)");
			document.getElementById('qurdu').focus();
			return false;
		}
		var  agerman1= document.getElementById('agerman1').value;
		if(agerman1=="")
		{
		show_danger("Please Enter Answer1 (German)");
		document.getElementById('agerman1').focus();
		return false;
		}
   
		var  aenglish1= document.getElementById('aenglish1').value;
		if(aenglish1=="")
		{
			show_danger("Please Enter Answer1 (English)");
			document.getElementById('aenglish1').focus();
			return false;
		}
		var  aurdu1= document.getElementById('aurdu1').value;
		if(aurdu1=="")
		{
			show_danger("Please Enter Answer1 (Urdu)");
			document.getElementById('aurdu1').focus();
			return false;
		}
		var  agerman2= document.getElementById('agerman2').value;
		if(agerman2=="")
		{
		show_danger("Please Enter Answer2 (German)");
		document.getElementById('agerman2').focus();
		return false;
		}
   
		var  aenglish2= document.getElementById('aenglish2').value;
		if(aenglish2=="")
		{
			show_danger("Please Enter Answer2 (English)");
			document.getElementById('aenglish2').focus();
			return false;
		}
		var  aurdu2= document.getElementById('aurdu2').value;
		if(aurdu2=="")
		{
			show_danger("Please Enter Answer2 (Urdu)");
			document.getElementById('aurdu2').focus();
			return false;
		}
		var  agerman3= document.getElementById('agerman3').value;
		if(agerman3=="")
		{
		show_danger("Please Enter Answer3 (German)");
		document.getElementById('agerman3').focus();
		return false;
		}
   
		var  aenglish3= document.getElementById('aenglish3').value;
		if(aenglish3=="")
		{
			show_danger("Please Enter Answer3 (English)");
			document.getElementById('aenglish3').focus();
			return false;
		}
		var  aurdu3= document.getElementById('aurdu3').value;
		if(aurdu3=="")
		{
			show_danger("Please Enter Answer3 (Urdu)");
			document.getElementById('aurdu3').focus();
			return false;
		}
		var myform = document.getElementById("questionform");
		var fd = new FormData(myform);
		$.ajax({
		url: "questions/add_question.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#questionform').trigger("reset");
		$("#qModal").modal("hide");
		$("#Qtopic").html(dataofconfirm);
			reload_question();
			
			
			
		}
		
		});
				
	}

function reload_question()
{
	
      $.ajax({    //create an ajax request
        type: "GET",
        url: "questions/view_question.php",            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#getquestion").html(''); 
            $("#getquestion").html(response); 
			
			$('#dataTable').DataTable();
            //alert(response);
        }

   
});
}

function question_details(id,language,catid)
{	
			$.ajax({
			url: "questions/question_details.php?id="+id+"&language="+language+"&catid="+catid,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body").html(data);

				$("#detailsModal").modal("show");
			}
			});
}

function question_details_arabic(id=0)
{	
			$.ajax({
			url: "questions/question_details_arabic.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_arabic").html(data);

				$("#detailsModal_arabic").modal("show");
			}
			});
}

function question_details_english(id=0)
{	
			$.ajax({
			url: "questions/question_details_english.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_english").html(data);

				$("#detailsModal_english").modal("show");
			}
			});
}

function question_details_pashto(id=0)
{	
			$.ajax({
			url: "questions/question_details_pashto.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_pashto").html(data);

				$("#detailsModal_pashto").modal("show");
			}
			});
}

function question_details_urdu(id=0)
{	
			$.ajax({
			url: "questions/question_details_urdu.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_urdu").html(data);

				$("#detailsModal_urdu").modal("show");
			}
			});
}

function question_details_bengali(id=0)
{	
			$.ajax({
			url: "questions/question_details_bengali.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_bengali").html(data);

				$("#detailsModal_bengali").modal("show");
			}
			});
}

function question_details_persian(id=0)
{	
			$.ajax({
			url: "questions/question_details_persian.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#detailsModal_body_persian").html(data);

				$("#detailsModal_persian").modal("show");
			}
			});
}

function edit_question(id=0){	
			$.ajax({
			url: "questions/edit_question.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#editquestionModal_body").html(data);

				$("#editquestionModal").modal("show");
			}
			});
}

function add_category()
	{
	
		var  c_name_english= document.getElementById('c_name_english').value;
		if(c_name_english=="")
		{
		show_danger("Please Enter Category Name (English)");
		document.getElementById('c_name_english').focus();
		return false;
		}
   
		var  c_name_german= document.getElementById('c_name_german').value;
		if(c_name_german=="")
		{
			show_danger("Please Enter Category Name (German)");
			document.getElementById('c_name_german').focus();
			return false;
		}
		var  c_name_urdu= document.getElementById('c_name_urdu').value;
		if(c_name_urdu=="")
		{
			show_danger("Please Enter Category Name (Urdu)");
			document.getElementById('c_name_urdu').focus();
			return false;
		}
		var  fileInput= document.getElementById('fileInput').value;
		if(fileInput=="")
		{
			show_danger("Please Add Category Image");
			document.getElementById('fileInput').focus();
			return false;
		}
		var myform = document.getElementById("categoryform");
		var fd = new FormData(myform);
		$.ajax({
		url: "category/add_category.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		
		$('#categoryform').trigger("reset");
		$("#catModal").modal("hide");
		$("#Acategory").html(dataofconfirm);
			reload_category();
			
			
			
		}
		
		});
				
	}

function reload_category()
{
	
      $.ajax({    //create an ajax request
        type: "GET",
        url: "category/view_category.php",            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#getcategory").html(''); 
            $("#getcategory").html(response); 
			
			$('#dataTable').DataTable();
            //alert(response);
        }

   
});

}

function delete_category(id=0)
{
	$.ajax({
			url: "category/delete_category.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deletecatModal_body").html(data);

				$("#deletecatModal").modal("show");
				
			}
			});
}

function deleteconfirm_category(id)
{
 	var myform2 = document.getElementById("deletecat");
		var fd = new FormData(myform2);
		$.ajax({
		url: "category/deleteconfirm.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Category Deleted Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    });
		$('#deletecat').trigger("reset");
		$("#deletecatModal").modal("hide");
		$("#deletconfirmcat").html(dataofconfirm);

			reload_category();
			
			
		}
		
		});
}
function reload_category()
{
	
      $.ajax({    //create an ajax request
        type: "GET",
        url: "category/view_category.php",            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#getcat").html(''); 
            $("#getcat").html(response); 
			
			$('#dataTable').DataTable();
            //alert(response);
        }

   
});

}


function delete_question(id=0)
{
	$.ajax({
			url: "questions/delete_question.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deletequesModal_body").html(data);

				$("#deletequesModal").modal("show");
				
			}
			});
}

function deleteconfirm_question(id)
{
 	var myform2 = document.getElementById("deletequestion");
		var fd = new FormData(myform2);
		$.ajax({
		url: "questions/deleteconfirm.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Deleted Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'questions.php';
                                i && (location.href = i)
                            }
                        }))

		$('#deletequestion').trigger("reset");
		$("#deletequesModal").modal("hide");
		$("#deletconfirmqest").html(dataofconfirm);
		
		
		}
		
		});
}

function update_question_urdu(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_urdu_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_urdu.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'urdu_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}
function update_question_pashto(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_pashto_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_pashto.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'pashto_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}
function update_question_arabic(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_arabic_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_arabic.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'arabic_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}

function update_question_persian(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_persian_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_persian.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'persian_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}

function update_question_bengali(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_bengali_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_bengali.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'bengali_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}

function update_question_english(id){
	
		//editchapter
		var myform1 = document.getElementById("update_question_english_form");
		var fd = new FormData(myform1);
		$.ajax({
		url: "questions/update_question_english.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Question Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'english_questions.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}

function status_update(id,status) {
		$.post("users/update_status.php",{id:id,status:status},function(data){
	    $("#ststs").html(data);});	
		
		
}

function payment_update(id,status) {
		$.post("users/update_payment.php",{id:id,status:status},function(data){
	    $("#ststs").html(data);});		
}


function a_details(id=0)
{	
			$.ajax({
			url: "agents/agent_details.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#adetailsModal_body").html(data);

				$("#adetailsModal").modal("show");
			}
			});
}

function aedit(id=0)
{	
			$.ajax({
			url: "agents/edit_agent.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#aeditModal_body").html(data);

				$("#aeditModal").modal("show");
			}
			});
}

function payment_update12(id=0)
{	
			$.ajax({
			url: "users/edit_plan.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#payment_edit_Modal_body").html(data);

				$("#payment_edit_Modal").modal("show");
			}
			});
}

function update_agent(id){
	
		//editchapter
		var myform1 = document.getElementById("editagnets");
		var fd = new FormData(myform1);
		$.ajax({
		url: "agents/update_agent.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Agent Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'agents.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}
function update_plan(id){
	
		//editchapter
		var myform1 = document.getElementById("editplan");
		var fd = new FormData(myform1);
		$.ajax({
		url: "users/update_plan.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Payment Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                var i = 'payments.php';
                                i && (location.href = i)
                            }
                        }))
		}
		});
}


function u_details(id=0)
{	
			$.ajax({
			url: "agents/users_details.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#udetailsModal_body").html(data);

				$("#udetailsModal").modal("show");
			}
			});
}
function users_details(id=0)
{	
			$.ajax({
			url: "users/users_details.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#userdetailsModal_body").html(data);

				$("#userdetailsModal").modal("show");
			}
			});
}

function payment_details(id=0)
{	
			$.ajax({
			url: "users/payment_details.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#paymentdetailsModal_body").html(data);

				$("#paymentdetailsModal").modal("show");
			}
			});
}

function delete_payment(id=0){
	$.ajax({
			url: "users/delete_payments.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deletepaymentModal_body").html(data);

				$("#deletepaymentModal").modal("show");
				
			}
			});
}

function deleteconfirm_payment(id)
{
 	var myform2 = document.getElementById("deletePay");
		var fd = new FormData(myform2);
		$.ajax({
		url: "users/deleteconfirmP.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
			Swal.fire({
                    text: "Your Payment Deleted Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'payments.php';
                                i && (location.href = i)
                            }
                        }))
		$('#deletePay').trigger("reset");
		$("#deletepaymentModal").modal("hide");
		$("#deletconfirmP").html(dataofconfirm);
		}
		
		});
}

function create_payment()
	{
		var  useremail= document.getElementById('useremail').value;
		if(useremail=="")
		{
			toastr.error("Select User", "Success");
			document.getElementById('useremail').focus();
			return false;
		}
		var myform = document.getElementById("create_payment_form");
		var fd = new FormData(myform);
		$.ajax({
		url: "users/add_payment.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
		Swal.fire({
                    text: "Your Payment Added Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'payments.php';
                                i && (location.href = i)
                            }
                        }))
		$('#create_payment_form').trigger("reset");
		$("#add_payment_modal").modal("hide");
		$("#Adpay").html(dataofconfirm);
		}
		
		});
				
	}

function edit_plan_payment(id=0){
	$.ajax({
			url: "plan/edit_plan.php?id="+id,
			data: {id:id},
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#editplan_modal_body").html(data);

				$("#editplan_modal").modal("show");
				
			}
			});
}

function update_payment_plan(id)
{
 	var myform2 = document.getElementById("editplanpayment");
		var fd = new FormData(myform2);
		$.ajax({
		url: "plan/update_plan.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
			Swal.fire({
                    text: "Your Plan Updated Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'plans.php';
                                i && (location.href = i)
                            }
                        }))
		$('#editplanpayment').trigger("reset");
		$("#editplan_modal").modal("hide");
		$("#updatepaymentplan").html(dataofconfirm);
		}
		
		});
}

function delete_payment_plan(id=0){
	$.ajax({
			url: "plan/delete_plan.php?id="+id,
			data: {id:id},
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				$("#deletepaymentplanModal_body").html(data);

				$("#deletepaymentplanModal").modal("show");
				
			}
			});
}

function deleteconfirm_plan(id)
{
 	var myform2 = document.getElementById("deleteplan");
		var fd = new FormData(myform2);
		$.ajax({
		url: "plan/deleteconfirm.php",
		data: fd,
		cache: false,
		processData: false,
		contentType: false,
		type: 'POST',
		success: function (dataofconfirm) {
			Swal.fire({
                    text: "Your Plan Deleted Successfully!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                    }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'plans.php';
                                i && (location.href = i)
                            }
                        }))
		$('#deleteplan').trigger("reset");
		$("#deletepaymentplanModal").modal("hide");
		$("#deletconfirmplan").html(dataofconfirm);
		}
		
		});
}
