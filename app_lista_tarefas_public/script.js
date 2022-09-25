if(location.search == '?inclusao=1'){
    setInterval(()=>{
        location.href = 'nova_tarefa.php';
    },3000);
}

function editar(id, txt_tarefa) {

    let form = document.createElement('form');
    form.action = "index.php?pag=index&acao=atualizar";
    form.method = 'post';
    form.className = 'row';

    let inputTarefa = document.createElement('input');
    inputTarefa.type = 'text';
    inputTarefa.name = 'tarefa';
    inputTarefa.className = 'col-9 form-control';
    inputTarefa.value = txt_tarefa;

    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;

    let button = document.createElement('button');
    button.type = 'submit';
    button.className = 'btn col-3 btn-info';
    button.innerHTML = 'atualizar';

    form.appendChild(inputTarefa);
    form.appendChild(inputId);
    form.appendChild(button);
    
    let tarefa = document.getElementById('tarefa_'+id);

    tarefa.innerHTML = '';

    tarefa.insertBefore(form, tarefa[0]);
    
   
}

function remover(id) {
    location.href = 'index.php?pag=index&acao=remover&id=' + id;

}

function marcarRealizada(id){
    location.href = 'index.php?pag=index&acao=marcarRealizada&id=' + id;

}
