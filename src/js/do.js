Rp(function() {
	genComment = function(user_id, author, body, time, comment_id) {
		var oImg=document.createElement("img");
		oImg.setAttribute('src', 'avatar/'+user_id+'.jpg');
		oImg.setAttribute('class', 'imgComment');
		oImg.setAttribute('height', '32px');
		oImg.setAttribute('width', '32px');
		article = document.createElement('article');
		article.className = 'comment';
		header = document.createElement('header');
		h4 = document.createElement('h4');
		h4.appendChild(document.createTextNode(author));
		header.appendChild(oImg);
		header.appendChild(h4);

		var today = new Date(time*1000);
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var hours = today.getHours();
		var minutes = today.getMinutes();
		if(hours<10){hours='0'+hours}
		if(minutes<10){minutes='0'+minutes}
		if(dd<10){dd='0'+dd}
		if(mm<10){mm='0'+mm}
		d=hours+':'+minutes+' - '+dd+'/'+mm;

		times = document.createElement('span');
		times.className = 'time';
		times.appendChild(document.createTextNode(d));
		header.appendChild(times);
		
		if (user_id == _user_id) {
			del = document.createElement('a');
			del.setAttribute('href', '#');
			del.setAttribute('onclick', 'deleteComment('+comment_id+')');
			del.appendChild(document.createTextNode('Delete'));
			header.appendChild(del);
		}
		
		body = body.replace('\n', '<br>');
		p = document.createElement('p');
		p.appendChild(document.createTextNode(body));

		article.appendChild(header);
		article.appendChild(p);

		return article;
	};
	
	genTask = function(task) {
		article = document.createElement('article');
		article.className = 'task';
		header = document.createElement('header');
		h1 = document.createElement('h1');
		label = document.createElement('label');
		span = document.createElement('span');
		span.className = 'task-checkbox';
		chkbox = document.createElement('input');
		chkbox.className = 'task-checkbox';
		chkbox.setAttribute('type', 'checkbox');
		chkbox.setAttribute('onclick', 'negateTask('+task.task_id+'); refreshTask('+_user_id+','+_category_id+')');
		if (task.done == 1)
			chkbox.setAttribute('checked');
		span.appendChild(chkbox);
		title = document.createElement('a');
		title.appendChild(document.createTextNode(task.name));
		title.setAttribute('href','view_tugas.php?task_id='+task.task_id);
		label.appendChild(span);
		label.appendChild(title);
		h1.appendChild(label);
		header.appendChild(h1);
		
		details = document.createElement('div');
		details.className = 'details';
		p = document.createElement('p');
		p.className = 'deadline';
		detail_label = document.createElement('span');
		detail_label.className = 'detail-label';
		detail_label.appendChild(document.createTextNode('Deadline:'));
		detail_content = document.createElement('span');
		detail_content.className = 'detail-content';
		detail_content.appendChild(document.createTextNode(task.deadline));
		p.appendChild(detail_label);
		p.appendChild(detail_content);
		
		tags = document.createElement('p');
		tags.className = 'tags';
		detail_label = document.createElement('span');
		detail_label.className = 'detail-label';
		detail_label.appendChild(document.createTextNode('Tag:'));
		tags.appendChild(detail_label);
		for(i = 0; i < task.tags.length; i++) {
			tag = document.createElement('span');
			tag.className = 'tag';
			tag.appendChild(document.createTextNode(task.tags[i].name));
			tags.appendChild(tag);
		}
		
		details.appendChild(p);
		details.appendChild(tags);
		
		if (task.user_id == _user_id) {
			del = document.createElement('a');
			del.setAttribute('href', '#');
			del.setAttribute('onclick', 'deleteTask('+task.task_id+')');
			del.appendChild(document.createTextNode('Delete'));
			details.appendChild(del);
		}

		article.appendChild(header);
		article.appendChild(details);

		return article;
	};

	Rp('#searchBar').on('keyup', function() {
		q = this.value;
		e = document.getElementById('searchMode');
		mode = e.options[e.selectedIndex].value;
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				var parsedJSON = eval('('+xmlhttp.responseText+')');
				document.getElementById("suggestion").innerHTML = "";
				for (index=0; index < parsedJSON.length; index++) {
					document.getElementById("suggestion").innerHTML += '<option value="'+parsedJSON[index].q+'">\n'
					console.log(parsedJSON[index].q);
				}
			}
		}
		xmlhttp.open("GET","core/search.php?q="+q+"&mode="+mode,true);
		xmlhttp.send();
		console.log(q);
	});

	Rp('#commentForm').on('submit', function(e) {
		e.preventDefault();
		body = Rp('#commentBody').val();
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("POST","core/postComment.php",false);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("task_id="+_task_id+"&content="+body);
		refreshComment(_task_id,_page);
		Rp('#commentBody').nodes[0].value = "";
	});

	Rp('#loginLink').on('click', function(e) {
		e.preventDefault();

		Rp('#loginBox').toggleClass('visible');

		Rp('#login_username').nodes[0].focus();
	})

	Rp('#loginForm').on('submit', function(e) {

		e.preventDefault();
		u = Rp('#login_username').val();
		p = Rp('#login_password').val();
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","core/auth.php?username="+u+"&password="+p,false);
		xmlhttp.send();
		var parsedJSON = eval('('+xmlhttp.responseText+')');

		if (parsedJSON.success)
			window.location.href = 'dashboard.php';
		else
			alert('Invalid username/password combination.');
	});
	Rp('#editTaskLink').on('click', function(e) {
		e.preventDefault();

		if (Rp('#editTaskLink').hasClass('editing')) {
			Rp('#editTaskLink').nodes[0].innerHTML = 'Edit Task';
			Rp('#editTaskLink').removeClass('editing');
			Rp('#edit-task').hide();
			Rp('#current-task').show();
		}
		else {
			Rp('#editTaskLink').nodes[0].innerHTML = 'Save';
			Rp('#editTaskLink').addClass('editing');
			Rp('#current-task').hide();
			Rp('#edit-task').nodes[0].style.display = 'block';


		}
	});
});

function negateTask(task_id){
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("POST","core/negateTask.php",false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("task_id="+task_id);
}

function deleteComment(comment_id){
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("POST","core/deleteComment.php",false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("comment_id="+comment_id);
	if ((_page-1)*10 == parseInt(_commentCount-1)) {
		_page = _page - 1;
	}
	refreshComment(_task_id,_page);
}

function deleteTask(task_id){
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("POST","core/deleteTask.php",false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("task_id="+task_id);
	refreshTask(_user_id,_category_id);
}

function refreshComment(task_id,page){
	_page = page;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","core/getComment.php?task_id="+task_id+"&offset="+((page-1)*10),false);
	xmlhttp.send();
	var parsedJSON = eval('('+xmlhttp.responseText+')');
	document.getElementById('commentsList').innerHTML = "";
	for (index=0; index < parsedJSON.length; index++) {
		comment = genComment(parsedJSON[index].user_id,parsedJSON[index].user_name,parsedJSON[index].content,parsedJSON[index].time,parsedJSON[index].comment_id);
		document.getElementById('commentsList').innerHTML += comment.outerHTML;
	}
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","core/countComment.php?task_id="+task_id,false);
	xmlhttp.send();
	_commentCount = xmlhttp.responseText;
	document.getElementById('commentCount').innerHTML = _commentCount;
	if (xmlhttp.responseText > 10) {
		document.getElementById('commentPage').innerHTML = "Page :";
		for (index=1; (index-1)*10 < _commentCount; index++) {
			number = document.createElement('a');
			number.className = 'numbers';
			if (index == page)
				number.className += ' active';
			number.setAttribute('href', '#');
			number.setAttribute('onclick', 'refreshComment('+_task_id+','+index+')');
			number.appendChild(document.createTextNode(index));
			document.getElementById('commentPage').innerHTML += number.outerHTML;
		}
	} else {
		document.getElementById('commentPage').innerHTML = "";
	}
}

function refreshTask(user_id,category_id){
	_category_id = category_id;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","core/getTask.php?user_id="+user_id+"&category_id="+category_id+"&done=0",false);
	xmlhttp.send();
	var parsedJSON = eval('('+xmlhttp.responseText+')');
	header = document.createElement('header');
	h3 = document.createElement('h3');
	h3.appendChild(document.createTextNode('Current Task'));
	header.appendChild(h3);
	document.getElementById('activeTask').innerHTML = header.outerHTML;
	header = document.createElement('header');
	h3 = document.createElement('h3');
	h3.appendChild(document.createTextNode('Completed Task'));
	header.appendChild(h3);
	document.getElementById('doneTask').innerHTML = header.outerHTML;
	var done =false;
	var active = false;
	for (index=0; index < parsedJSON.length; index++) {
		task = genTask(parsedJSON[index]);
		if (parsedJSON[index].done == 0) {
			document.getElementById('activeTask').innerHTML += task.outerHTML;
			active = true;
		} else {
			document.getElementById('doneTask').innerHTML += task.outerHTML;
			done = true;
		}
	}
	if (active == 0)
		document.getElementById('activeTask').innerHTML += 'No task available!';
	if (done == 0)
		document.getElementById('doneTask').innerHTML += 'No task available!';
}

function refreshCategory(user_id){
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","core/getCategory.php?user_id="+user_id,false);
	xmlhttp.send();
	var parsedJSON = eval('('+xmlhttp.responseText+')');
	document.getElementById('categoryList').innerHTML = "";
	for (index=0; index < parsedJSON.length; index++) {
		list = document.createElement('li');
		link = document.createElement('a');
		link.appendChild(document.createTextNode(parsedJSON[index].name));
		link.setAttribute('href', '#');
		link.setAttribute('onclick', 'refreshTask('+_user_id+','+parsedJSON[index].category_id+')');
		list.appendChild(link);
		document.getElementById('categoryList').innerHTML += list.outerHTML;
	}
	if (parsedJSON.length == 0)
		document.getElementById('categoryList').innerHTML += 'No Category Available!';
}