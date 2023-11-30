function add_hidden_field(){
	let commentform = document.getElementById('commentform');
	let hiddenfield = document.createElement('div');

	hiddenfield.classList.add('user-ip');
	hiddenfield.textContent = user_ip;
	hiddenfield.style.display = "none";
	commentform.append(hiddenfield);
}

document.addEventListener("DOMContentLoaded", add_hidden_field);