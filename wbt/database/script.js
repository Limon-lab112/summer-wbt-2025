var database=[
    {
        UserName:"Limon",
        Password:123
    }
];

var Name=prompt("Enter your name please");
var Pass=prompt("Enter your password please");



function UserSign(Name,Pass)
{
    if(Name==database[0].UserName && Pass==database[0].Password)
    {
      var para = new URLSearchParams(window.location.search);
        var fname = para.get("firstname");
        var lname = para.get("lastname");
        var email = para.get("email");
        var reason = para.get("contact_reason");
        var service = para.getAll("service");
        var hire = para.get("job_offer");
        var position = para.get("position");
        var comment = para.get("comment");


        console.log(fname);
        console.log(lname);
        console.log(email);
        console.log(reason);
        console.log(service.join(", "));
        console.log(hire);
        console.log(position);
        console.log(comment);
    }
    else
    {
        console.log("Incorrect Username or Password, Please provide right info");
    }
}
UserSign(Name,Pass);

