window.onload = function(e) {
	fetch(
		'http://localhost:80/PhpBackEnd/carga', {		
		}).then(response => response.json())
	.then(data => { 
		console.log(data);PhpBackEnd
		data.forEach(carga => {  
			var table = document.getElementById('tabelaCarga');
			var row = table.insertRow(-1);
			var idColuna = row.insertCell(0);
			var nomeColuna = row.insertCell(1); 
			var descColuna = row.insertCell(2);
			idColuna.innerHTML = carga.id;
			nomeColuna.innerHTML = carga.nome;
			descColuna.innerHTML = carga.peso;
		})
	}).catch(error => console.error(error))
}

function enviarForm() {
	console.log("alo");
	var form = document.getElementById('adicionarCarga');
	var data = {};
	data['nome'] = form.nome.value 
	data['peso'] = form.peso.value;
	console.log(JSON.stringify(data));
	fetch('http://localhost:80/PhpBackEnd/carga', {
		method: 'POST',       
		body: JSON.stringify(data)
	})
	.then((response) => {
		if (response.ok) {
			form.reset();
			return response.json();			
		} else {
			return Promise.reject({ status: res.status, statusText: res.statusText });
		}   

	})
	.then((data) => console.log(data))
	.catch(err => console.log('Error message:', err.statusText));
}