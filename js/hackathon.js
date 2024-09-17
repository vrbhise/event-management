document.addEventListener('DOMContentLoaded', function () {
    const teamSizeInput = document.getElementById('team_size');
    const teamMembersContainer = document.getElementById('team_members_container');

    // Function to update team member fields dynamically
    function updateTeamMembers() {
        const teamSize = parseInt(teamSizeInput.value);
        teamMembersContainer.innerHTML = '';  // Clear existing fields

        for (let i = 1; i <= teamSize; i++) {
            const div = document.createElement('div');
            div.classList.add('form-group');

            const label = document.createElement('label');
            label.setAttribute('for', `team_member_${i}`);
            label.textContent = `Team Member ${i} Name:`;

            const input = document.createElement('input');
            input.type = 'text';
            input.id = `team_member_${i}`;
            input.name = `team_member_${i}`;
            input.required = true;

            div.appendChild(label);
            div.appendChild(input);
            teamMembersContainer.appendChild(div);
        }
    }

    // Initial setup based on default value
    updateTeamMembers();

    // Update team members dynamically when team size changes
    teamSizeInput.addEventListener('input', updateTeamMembers);
});

