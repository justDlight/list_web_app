    $(document).ready(function(){
        $('#title').focus();
            $('#text').autosize();
        });
    
        //Three arrays to store meals, ingredients & an empty array to store the newly created shopping list
        var mealArray = [""];//Meal Array 
        var item_counter = 0;//Counter for the items in the meal array
    
        //Function to add a item to the meal array
        function addToPredifinedList() {
            //Prompting user and storing his input in a variable
            var newMeal = prompt("Enter the name of the item you would like to add to the list:", "items name");
        
            //If the user inputted some text add that text to the meal array
            if (newMeal != null) {
                item_counter++;
                //Formatting the meal array
                mealArray.push("Item: " + item_counter + " " + newMeal + "\n");
            }
        
            var selected_text = JSON.stringify(mealArray); // convert array to string
            document.cookie = "selected_item=" + selected_text; // Making the coookie
            document.getElementById("text_area").innerHTML = mealArray; //Storing the meal array in the textarea
        }
    
        //Updates the list by displaying the meal array in the text area useful for when item is deleted from the list
        function update() {
            document.getElementById("listHere").innerHTML = mealArray;
            document.getElementById("text_area").innerHTML = mealArray;
        }
    
        //Deletes an item from the list using includes method
        function deleteItem() {
            //Promt for user to delete the item with example and explanation
            var userDelete = prompt('To delete an item type the number of the item you want to delete behind "Item: " like in the example' + mealArray, "Item: 1");
            //Looping through the whole meal array
            for (var i = 0; i < mealArray.length; i++) {
                //If the meal array includes the user item number 
                if (mealArray[i].includes(userDelete)) {
                mealArray.splice(i, 1);//deleteing the item
                alert("Successfully deleted item");//alerting the user
                }
            }
        }
    
        //Delete the whole list function
        function deleteWholeList() {
            //Warning the user by prompt that they are about to delete there entire list
            var deleteWholeList = prompt('You are about to delete your entire list are you sure about this?\nType "Yes" to delete the whole list case sensitive', "No");
            //If the user proceeds by typing "Yes" than we will delete the whole list
            if (deleteWholeList.includes("Yes")) {
                while(mealArray.length > 0) {
                mealArray.pop();
            }
            //Sucess and error messages
            alert("Deleted list!");
            }
            else {
                alert("Failed to delete list!")
            }
        }

        //Download the list inside the text area function
        function download() {
            // Get the content of the text area
            var content = document.getElementById("text_area").value;
    
            // Create a blob object with the content
            var blob = new Blob([content], { type: "text/plain" });
    
            // Create a link for the user to download the blob
            var link = document.createElement("a");
            link.download = "my_list.txt";
            link.href = URL.createObjectURL(blob);
            link.click();
        }

