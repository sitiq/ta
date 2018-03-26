/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 */

$(document).ready(function () {
	$.validator.addMethod("noSpace", function(value, element) { 
        return value.trim().length != 0;  
	}, "No space please");
	
	$("#addEditUserForm").validate({
		rules: {
			fname: {
				required: true,
				noSpace: true
			},
			username: {
				required: true,
				minlength: 2,
				noSpace: true,
				remote: {
					url: baseURL + 'akademik/user/checkUsernameExists',
					type: 'post',
					data : { userId : function(){ return $("#userId").val(); } }
					// data: {
					// 	username: function () {
					// 		return $("#username").val();
					// 	}
					// }
				}
			},
			// email: {
			// 	required: true,
			// 	email: true,
			// 	remote: {
			// 		url: baseURL + 'akademik/user/checkEmailExists',
			// 		type: 'post',
			// 		data: {
			// 			email: function() {
			// 			  return $("#email").val();
			// 			}
			// 		}
			// 	}
			// },
			password: {
				required: true,
				noSpace: true,
				minlength: 5
			},
			cpassword: {
				required: true,
				equalTo: "#password"
			}
		},
		messages: {
			fname: {
				required: "Nama harus diisi",
				noSpace: "Nama tidak boleh kosong"
			},
			username: {
				required: "Username harus diisi",
				minlength: "Masukkan username minimal 2 karakter",
				remote: "Username sudah ada",
				noSpace: "Username tidak boleh kosong"
			},
			// email: {
			// 	required: "Alamat email harus diisi",
			// 	email: "Please enter valid email address",
			// 	remote: "Email sudah ada"
			// },
			password: {
				required: "Password harus diisi",
				minlength: "Password harus minimal 5 karakter",
				noSpace: "Password paling tidak harus berisi karakter"
			},
			cpassword: {
				required: "Confirm password harus diisi",
				equalTo: "Confirm password harus sama dengan password"
			}
			// mobile: {
			// 	required: "Nomor Handphone harus diisi",
			// 	digits: "Hanya boleh memasukkan nomor"
			// }
		}

	});
});