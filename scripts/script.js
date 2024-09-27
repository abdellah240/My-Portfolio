var projects = [
  { 
      name: "Stockholmes", 
      description: "A fictional stock market web application built with a team" 
  },
  { 
      name: "Portfolio", 
      description: "Entirely personalized web portfolio with user data management" 
  },
  { 
      name: "Dental Clinic System", 
      description: "Clinic operations software for managing clients and staff"
      
  }
];

var projectList = document.getElementById("project-list");

for (var i = 0; i < projects.length; i++) {
  var projectDiv = document.createElement("div");
  projectDiv.className = "project"
  var projectHTML = "<h5>" + projects[i].name + "</h5>";
  projectHTML += "<p>" + projects[i].description + "</p>";

  projectDiv.innerHTML = projectHTML;
  projectList.appendChild(projectDiv);
}
