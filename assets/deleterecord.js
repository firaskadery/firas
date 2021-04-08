function deleterecord(recordid,rec){
  if (confirm("are you sure you want to delete this record?")) {
    if(rec == "emp"){
      page = "Employee";
    }
    if(rec == "task")
    {
      page = "Task";
    }
    if(rec == "pro")
    {
      page = "Project";
    }
    window.location.href = "http://localhost/taskmanager/"+page+'/delete/'+recordid;
  }
}