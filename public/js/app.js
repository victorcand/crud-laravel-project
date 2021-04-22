require('./bootstrap');

function toggleInput(pizzaId) {
    const namePizzaEl = document.getElementById(`name-pizza-${pizzaId}`)
    const inputPizzaEl = document.getElementById(`input-name-pizza-${pizzaId}`)
    
    if (namePizzaEl.hasAttribute('hidden')) {
        namePizzaEl.removeAttribute('hidden');
        inputPizzaEl.hidden = true;

    } else {
        inputPizzaEl.removeAttribute('hidden');
        namePizzaEl.hidden = true;

    }
}

function editPizza(pizzaId) {
    let formData = new FormData()
    const pizzaName = document.querySelector(`#name`).value;
    const pizzaPrice = document.querySelector(`#price`).value;
    const pizzaDescription = document.querySelector(`#description`).value;
    const token = document.querySelector('input[name="_token"]').value;
    


    formData.append('pizza_name', pizzaName);
    formData.append('pizza_price', pizzaPrice);
    formData.append('pizza_description', pizzaDescription);
    formData.append('_token', token);


    // enviar para uma rota
    const url = `/pizzaria/${pizzaId}/edit`;

    //fazer uma requisição para url
    fetch(url, {
        body: formData,
        method: 'POST'
    }).then(() => {
        toggleInput(pizzaId); 
        
        //AQUI ESTÁ O PROBLEMA !!
    });

}



