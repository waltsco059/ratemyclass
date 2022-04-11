addClass.addEventListener("submit", (e) => {
    e.preventDefault();
    var cname = document.getElementById('add-class').value;
    var professor = document.getElementById('add-professor').value;
    var semester = document.getElementById('add-semester').value;
    var college = document.getElementById('add-college').value;
    console.log(cname, professor, semester, college)

// Example content-piece div
htmlBlock = `<div class="content-piece">
    <div class="info">
        <h1>Info</h1>
        <table>
            <tr>
                <td>Class:</td>
                <td>${cname}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>${professor}</td>
            </tr>
            <tr>
                <td>Semester:</td>
                <td>${semester}</td>
            </tr>
            <tr>
                <td>College:</td>
                <td>${college}</td>
            </tr>                        
        </table>
    </div>
    
    <!-- Main Content Piece Class Rating -->
    <div class="class-rating">
        <h1>Class Rating:</h1>
        <p>0</p>
    </div>

    <!-- Main Content Piece Professor Rating -->
    <div class="pofessor-rating">
        <h1>Professor Rating:</h1>
        <p>0</p>
    </div>
    
    <!-- Main Content Piece Rate Button -->
    <div class="rate-button">
        <a href="#">Rate this Class!</a>
    </div>
</div>`

$('#content').append(htmlBlock);

// hard reset the add class form
document.getElementById("addClass").style.display = "none";
document.getElementById("add-class").value = "";
document.getElementById("add-professor").value = "";
document.getElementById("add-semester").value = "Spring 2022";
document.getElementById("add-college").value = "Natural Sciences";

});
