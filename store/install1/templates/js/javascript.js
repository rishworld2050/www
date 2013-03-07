//============================================
// Maian Cart v2.0
// General Javascript Functions
// Written by David Ian Bennett
// http://www.maianscriptworld.co.uk
//============================================

function checkForm() {
  var message = '';
  if ($('#website').val()=='') {
    $('#website').addClass('errorbox');
    message = 'Please enter store name..\n';
  }
  if ($('#email').val()=='') {
    $('#email').addClass('errorbox');
    message += 'Please enter store email address..\n';
  }
  if (message) {
    alert(message);
    return false;
  }
}

function connectionTest() {
  $('#test').val('Please wait..');
  $('#test').attr('disabled','disabled');
  $(document).ready(function() {
    $.ajax({
      url: 'index.php',
      data: 'connectionTest=yes',
      dataType: 'html',
      success: function (data) {
        alert(data);
        $('#test').val('Test Connection');
        $('#test').removeAttr('disabled','');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  });   
}
