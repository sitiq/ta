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
      
	$("#addEditPeriodeForm").validate({
		rules: {
			semester: {
				required: true,
				noSpace: true
			},
			thn1: {
                required: true,
				noSpace: true
			},
			thn2: {
                required: true,
                greaterThan: '#thn1',
				noSpace: true
            },
            jenis: {
                required: true,
				noSpace: true
            },
            tanggal_awal: {
                required: true,
				noSpace: true
            },
            waktu_awal: {
                required: true,
				noSpace: true
            },
            tanggal_akhir: {
                required: true,
				noSpace: true
            },
            waktu_akhir: {
                required: true,
				noSpace: true
            }
		},
		messages: {
			semester: {
				required: "Semester harus diisi",
				noSpace: "Semester tidak boleh kosong"
			},
			thn1: {
                required: "Tahun pertama harus diisi",
				noSpace: "Tahun pertama tidak boleh kosong"
			},
			thn2: {
                required: "Tahun kedua harus diisi",
                greaterThan: 'Tahun kedua harus lebih besar dari tahun pertama',
				noSpace: "Tahun kedua tidak boleh kosong"
            },
            jenis: {
                required: "Jenis periode harus diisi",
				noSpace: "Jenis tidak boleh kosong"
            },
            tanggal_awal: {
                required: 'Tanggal awal harus diisi',
				noSpace: "Tanggal awal tidak boleh kosong"
            },
            waktu_awal: {
                required: 'Waktu awal harus diisi',
				noSpace: "Waktu awal tidak boleh kosong"
            },
            tanggal_akhir: {
                required: 'Tanggal akhir harus diisi',
				noSpace: "Tanggal akhir tidak boleh kosong"
            },
            waktu_akhir: {
                required: 'Waktu akhir harus diisi',
				noSpace: "Waktu akhir tidak boleh kosong"
            }
		}
	});
});