// JavaScript Document
function validate_form1 ()
{
	valid = true;
        if ( document.formazakaz.FormFio1.value == "" || document.formazakaz.FormPhone1.value == "")
        {
                alert ( "���������� ��������� ������ ����!" );
                valid = false;
        }
        return valid;
}

function validate_form ()
{
	valid = true;
        if ( document.formcallback.FormFio.value == "" || document.formcallback.FormPhone.value == "")
        {
                alert ( "���������� ��������� ������ ����!" );
                valid = false;
        }
        return valid;
}