import $ from 'jquery';
import 'bootstrap-datepicker';
import toastr from 'toastr';
$(document).ready(function(){
    $('#start_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    }).on('changeDate', function(e) {
        $(this).datepicker('hide');
    });

    $('#start_date').on('input', function() {
        var input = $(this).val();
        input = input.replace(/[^0-9]/g, ''); 
        if (input.length >= 4) {
            input = input.slice(0, 4) + '-' + input.slice(4);
        }
        if (input.length >= 7) {
            input = input.slice(0, 7) + '-' + input.slice(7);
        }
        $(this).val(input);
    });

    $('#projectCreateForm').on('submit', function(e) {
        var date = $('#start_date').val();
        var year = parseInt(date.split('-')[0]);
        var currentYear = new Date().getFullYear();

        if (year < currentYear || year > 2025) {
            e.preventDefault();
            toastr.error('O ano deve ser maior ou igual ao ano atual e menor ou igual a 2025.');
        }
        var regex = /^\d{4}-\d{2}-\d{2}$/;
        if (!regex.test(date)) {
            alert('Por favor, insira a data no formato YYYY-MM-DD');
            $(this).val('');
        }
    });
});