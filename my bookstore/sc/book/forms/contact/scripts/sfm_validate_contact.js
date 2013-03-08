function sfm_validate_contact()
{
var contactValidator = new Validator("contact");
contactValidator.addValidation("name",{required:true,message:"Please fill in name"} );
contactValidator.addValidation("name",{alpha_s:true,message:"The input for name should be a valid alphabetic value"} );
contactValidator.addValidation("email",{required:true,message:"Please fill in email"} );
contactValidator.addValidation("email",{email:true,message:"The input for email should be a valid email value"} );
contactValidator.addValidation("address",{required:true,message:"Please fill in address"} );
contactValidator.addValidation("address",{alnum_s:true,message:"The input for address should be a valid alpha-numeric value"} );
contactValidator.addValidation("ph_no",{numeric:true,message:"The input for ph_no should be a valid numeric value"} );
contactValidator.addValidation("ph_no",{maxlen:"11",message:"The length of the input for ph_no should not exceed 11"} );
contactValidator.addValidation("ph_no",{minlen:"10",message:"The length of the input for ph_no should be at least 10."} );
contactValidator.addValidation("ph_no",{greaterthan:"0.00",message:"The value of ph_no should be greater than 0.00"} );
contactValidator.addValidation("feedback",{required:true,message:"Please fill in feedback"} );

}