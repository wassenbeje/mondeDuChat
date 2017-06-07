/**
 * Fonctions de tri pour la visualisation des élèves ou des enseignants
 **/

function studentsRefresh() {
    var x = document.getElementById("select").value;
    window.location = "students.php?sort=" + x;
}

function teachersRefresh() {
    var x = document.getElementById("select").value;
    window.location = "teachers.php?sort=" + x;
}

function lessonsRefresh() {
    var x = document.getElementById("select").value;
    window.location = "lessons.php?sort=" + x;
}

/**
* Fonctions de redirection pour la page de détails
**/

function addTeacher() {
    window.location = "addMember.php?type=teacher";
}

function addStudent() {
    window.location = "addMember.php?type=student";
}

function addLessons() {
    window.location = "addLessons.php";
}