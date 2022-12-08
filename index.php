<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <link rel="stylesheet" href="./css/style.css">
  <title>TODO list</title>
</head>

<body>
  <div id="app">

    <div class="container py-3 w-50 text-center m-auto">
      <div v-if="errorMsg.length > 0" class="alert alert-danger" role="alert">
        {{errorMsg}}
      </div>
    </div>


    <div class="container py-3 w-50 text-center m-auto">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(todo, index) in todos" @click="toggleDone(index)" :key="index">
          <span class="w-100 h-100 task-item" :class="{'text-decoration-line-through' : todo.done }">{{todo.text}}</span>
          <span @click.stop="deleteTodo(index)" class="trash badge bg-danger p-2">
            <i class="fa-solid fa-trash"></i>
          </span>
        </li>
      </ul>
    </div>

    <section class="add-todo">
      <div class="container w-50 text-center m-auto">
        <div class="input-group input-group-sm mb-3">
          <input @keyup.enter="addTodo()" v-model.trim="todoStr" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
          <button @click="addTodo()" class="btn btn-outline-warning">Inserisci</button>
        </div>

      </div>
    </section>
  </div>

  <script src="./js/main.js"></script>
</body>

</html>