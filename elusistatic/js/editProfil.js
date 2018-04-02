/**
 * File : editProfil.js
 *
 * This file contain the validation of edit profil form
 *
 * Using validation plugin : jquery.validate.js
 */

$(document).ready(function () {
    $.validator.addMethod("noSpace", function(value, element) {
        return value.trim().length != 0;
    }, "No space please");

    $("#editProfilForm").validate({
        rules: {
            nama: {
                required: true,
                noSpace: true
            },
            nim: {
                required: true,
                noSpace: true,
                minlength: 18,
                remote: {
                    url: baseURL + 'mahasiswa/profil/checkNimExists',
                    type: 'post',
                    data : {
                        nim : function(){
                            return $("#nim").val();
                        }
                    }
                }
            },
            email: {
            	required: true,
            	email: true,
            	remote: {
            		url: baseURL + 'mahasiswa/profil/checkEmailExists',
            		type: 'post',
            		data: {
            			email: function() {
            			  return $("#email").val();
            			}
            		}
            	}
            },
            ipk: {
                required: true,
                noSpace: true,
                minlength: 4
            },
            jumlah_sks: {
                required: true,
                noSpace: true,
                minlength: 3
            }
        },
        messages: {
            nama: {
                required: "Nama harus diisi",
                noSpace: "Nama tidak boleh kosong"
            },
            nim: {
                required: "NIM harus diisi",
                minlength: "Masukkan NIM lengkap dan valid",
                remote: "NIM sudah ada",
                noSpace: "NIM tidak boleh kosong"
            },
            email: {
            	required: "Alamat email harus diisi",
            	email: "Masukkan email valid",
            	remote: "Email sudah ada"
            },
            ipk: {
                required: "IPK harus diisi",
                noSpace: "IPK tidak boleh kosong",
                minlength: "Contoh : 3.95",
            },
            jumlah_sks: {
                required: "Jumlah harus diisi",
                noSpace: "IPK tidak boleh kosong",
                minlength: "Minimal telah menempuh 100 SKS"
            }
            // mobile: {
            // 	required: "Nomor Handphone harus diisi",
            // 	digits: "Hanya boleh memasukkan nomor"
            // }
        }

    });
});