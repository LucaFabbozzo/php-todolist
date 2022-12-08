const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      todos: [],
      todoStr: '',
      errorMsg: ''
    };
  },
  methods: {
    getTodos() {
      axios.get(this.apiUrl)
        .then(result => {
        console.log(result.data);
        this.todos = result.data;
      })
    },
    addTodo() {
      this.errorMsg = '';
      console.log(this.todoStr);

        //preparo la chiave valore da inviare in POST
      const data = {
        todoText: this.todoStr
      }

      axios.post(this.apiUrl, data, {
        // se non uso il FormData, devo passare questo oggetto alla chiamata
        headers: {'Content-Type': 'multipart/form-data'}
      })
        .then(result => {
          this.todoStr = '';
          this.todos = result.data;
        })
    },
    toggleDone(index) {
      this.errorMsg = '';

      // utilizzando FormData questa è la sintassi per passare i parametri
      const data = new FormData();
      data.append('toggleDone', index)

      //con formData non devo aggiungere l'oggetto con headers
      axios.post(this.apiUrl, data)
        .then(result => {
        this.todos = result.data;
      })
    },
    deleteTodo(index) {
      this.errorMsg = '';
      if (!this.todos[index].done) {
        this.errorMsg = 'Prima di eliminare è necessario aver svolto il todo'
      } else {
      if (confirm("confermi l'elimininazione?")) {
       const data = new FormData();
       data.append("deleteTodo", index);

       axios.post(this.apiUrl, data).then((result) => {
         this.todos = result.data;
       });
     }
    }
    }
  },
  mounted() {
    this.getTodos();
  },
}).mount("#app");
