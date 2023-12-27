const firebaseConfig = {
    apiKey: "AIzaSyCdREkP5NR6P3PWxP-IL094Pqk1atycSaQ",
    authDomain: "hardware-project-6c299.firebaseapp.com",
    databaseURL: "https://hardware-project-6c299-default-rtdb.firebaseio.com",
    projectId: "hardware-project-6c299",
    storageBucket: "hardware-project-6c299.appspot.com",
    messagingSenderId: "703471520126",
    appId: "1:703471520126:web:294f24a86be6ddbf340b2f"
  };

  // initialize firebase
firebase.initializeApp(firebaseConfig);

  // Initialize Firebase
//const app = initializeApp(firebaseConfig);

// reference your database
var messagesRef = firebase.database().ref("Sheduled_times");

document.getElementById('time_form').addEventListener('submit', submitForm);

function submitForm(e) {
    e.preventDefault();

    var myList = document.getElementById("time_list");
    var listItems = myList.getElementsByTagName("li");
    
    // Accessing list items by index
    /*var firstItem = listItems[0];  // Item 1
    var secondItem = listItems[1]; // Item 2
    var thirdItem = listItems[2];  // Item 3
    var fourthItem = listItems[3];  //Item 4
    
    var itemValue1 = firstItem.textContent;
    var itemValue2 = secondItem.textContent;
    var itemValue3 = thirdItem.textContent;
    var itemValue4 = fourthItem.textContent;*/

    var m = 0;
    var a = 0;
    var e = 0;
    var n = 0;

    for (let i = 0; i < 5 && i < listItems.length; i++) {
      var itemValue = listItems[i].textContent;
      if (itemValue == "Morning") {
        m=1;
      }
      if (itemValue == "Afternoon") {
        a=1;
      }
      if (itemValue == "Evening") {
        e=1;
      }
      if (itemValue == "Night") {
        n=1;
      }
    }

    saveMessage(m, a, e, n);
}

/*const saveMessage = (item1, item2, item3, item4) => {
    var newMessageRef = messagesRef.push()
    newMessageRef.set({
        item1 : item1,
        item2 : item2,
        item3 : item3,
        item4 : item4,
    });
};*/

const saveMessage = (item1, item2, item3, item4) => {
  messagesRef.update({
    Morning: item1,
    Afternoon: item2,
    Evening: item3,
    Night: item4,
  });
};