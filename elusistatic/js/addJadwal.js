$(document).ready(function () {
    $.validator.addMethod("noSpace", function(value, element) {
        return value.trim().length != 0;
    }, "Tidak boleh ada spasi");
    $.validator.addMethod("greaterThan", function(value, element, params) {
        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }
        return isNaN(value) && isNaN($(params).val())
            || (Number(value) > Number($(params).val()));
    },'Must be greater than {0}.');
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != $(param).val();
    }, "This has to be different...");

    $("#jadwalForm").validate({
        rules: {
            tanggalJadwal: {
                required: true,
                noSpace: true,
                greaterThan: ".StartDate"
            },
            waktuJadwal: {
                required: true,
                noSpace: true
            },
            ruangJadwal: {
                required: true,
                noSpace: true
            },
            dataKetua: {
                required: true
            },
            dataSekretaris: {
                notEqual: "#dataKetua"
            }
        },
        messages: {
            tanggalJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi',
                greaterThan: 'Tidak boleh tanggal kemarin'
            },
            waktuJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi'
            },
            ruangJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi'
            },
            dataKetua: {
                required: 'Wajib diisi'
            },
            dataSekretaris: {
                notEqual: 'Tidak boleh sama dengan ketua'
            }
        }
    });
});
$(document).ready(function () {
    $.validator.addMethod("noSpace", function(value, element) {
        return value.trim().length != 0;
    }, "Tidak boleh ada spasi");
    $.validator.addMethod("greaterThan", function(value, element, params) {
        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }
        return isNaN(value) && isNaN($(params).val())
            || (Number(value) > Number($(params).val()));
    },'Must be greater than {0}.');
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != $(param).val();
    }, "This has to be different...");

    $("#jadwalFormEdit").validate({
        rules: {
            editTanggalJadwal: {
                required: true,
                noSpace: true,
                greaterThan: ".StartDate"
            },
            editWaktuJadwal: {
                required: true,
                noSpace: true
            },
            editRuangJadwal: {
                required: true,
                noSpace: true
            },
            editDataKetua: {
                required: true
            },
            editDataSekre: {
                notEqual: "#editDataKetua"
            }
        },
        messages: {
            editTanggalJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi',
                greaterThan: 'Tidak boleh tanggal kemarin'
            },
            editWaktuJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi'
            },
            editRuangJadwal: {
                required: 'Wajib diisi',
                noSpace: 'Wajib diisi'
            },
            editDataKetua: {
                required: 'Wajib diisi'
            },
            editDataSekre: {
                notEqual: 'Tidak boleh sama dengan ketua'
            }
        }
    });
});

