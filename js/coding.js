function generateTeamMemberFields() {
    const teamSize = parseInt(document.getElementById("team_size").value);
    const container = document.getElementById("teamMembersContainer");

    // Clear previous member fields
    container.innerHTML = "";

    if (teamSize >= 2 && teamSize <= 6) {
        for (let i = 1; i <= teamSize; i++) {
            const div = document.createElement("div");
            div.classList.add("form-group", "team-member");
            div.innerHTML = `
                <label for="team_member_${i}">Team Member ${i} Name:</label>
                <input type="text" id="team_member_${i}" name="team_member_${i}" required>
            `;
            container.appendChild(div);
        }
    } else {
        alert("Team size should be between 2 and 6 members.");
    }
}
