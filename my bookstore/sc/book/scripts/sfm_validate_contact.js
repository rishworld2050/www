function sfm_validate_contact()
{
var contactValidator = new Validator("contact");
contactValidator.addValidation("user_name",{required:true,message:"Please fill in user_name"} );
contactValidator.addValidation("user_name",{alnum:true,message:"The input for user_name should be a valid alpha-numeric value"} );
contactValidator.addValidation("user_name",{remote:"?sfm_check_unique=y",message:"This value is already submitted"} );
contactValidator.addValidation("user_name",{maxlen:"30",message:"The length of the input for user_name should not exceed 30"} );
contactValidator.addValidation("user_name",{minlen:"8",message:"The length of the input for user_name should be at least 8."} );
contactValidator.addValidation("email",{required:true,message:"Please fill in email"} );
contactValidator.addValidation("email",{email:true,message:"The input for email should be a valid email value"} );
contactValidator.addValidation("email",{remote:"?sfm_check_unique=y",message:"This value is already submitted"} );
contactValidator.addValidation("password",{required:true,message:"Please fill in password"} );
contactValidator.addValidation("password",{alnum:true,message:"The input for password should be a valid alpha-numeric value"} );
contactValidator.addValidation("password",{maxlen:"30",message:"The length of the input for password should not exceed 30"} );
contactValidator.addValidation("password",{minlen:"8",message:"The length of the input for password should be at least 8."} );
contactValidator.addValidation("password",{eqelmnt:"cpassword",message:"password should be equal to cpassword"} );
contactValidator.addValidation("cpassword",{required:true,message:"Please fill in cpassword"} );
contactValidator.addValidation("cpassword",{alnum:true,message:"The input for cpassword should be a valid alpha-numeric value"} );
contactValidator.addValidation("cpassword",{maxlen:"30",message:"The length of the input for cpassword should not exceed 30"} );
contactValidator.addValidation("cpassword",{minlen:"8",message:"The length of the input for cpassword should be at least 8."} );
contactValidator.addValidation("ph_no",{numeric:true,message:"The input for ph_no should be a valid numeric value"} );
contactValidator.addValidation("ph_no",{maxlen:"11",message:"The length of the input for ph_no should not exceed 11"} );
contactValidator.addValidation("ph_no",{minlen:"10",message:"The length of the input for ph_no should be at least 10."} );
contactValidator.addValidation("ph_no",{greaterthan:"0.00",message:"The value of ph_no should be greater than 0.00"} );

}