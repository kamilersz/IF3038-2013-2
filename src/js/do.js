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