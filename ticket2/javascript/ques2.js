function addItem() {
    const itemInput = document.getElementById('itemInput');
    const itemText = itemInput.value.trim();

    if (itemText === "") {
        alert("Please enter an item.");
        return;
    }

    // Create a new list item
    const li = document.createElement('li');
    li.textContent = itemText;

    // Add the new item to the list
    document.getElementById('itemList').appendChild(li);

    // Clear the input field
    itemInput.value = "";
}
