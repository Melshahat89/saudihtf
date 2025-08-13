<!-- START DESKTOP SEARCH SCRIPT -->
<script>
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
const deleteRecentSearch = document.querySelectorAll(".delete-search");
let suggestions = [
];

document.addEventListener('click', function (el){
    if(!el.target.classList.contains('search-input-input') && !el.target.classList.contains('delete-search')){
        searchWrapper.classList.remove("active");
    }

    if(el.target.classList.contains('delete-search')){
        $.ajax({
            type: 'GET',
            url: '/searchkeys/' + el.target.id + '/delete',

            success: function(){
                el.target.parentElement.parentElement.remove();
            }
        });
    }
});

// if user press any key and release
inputBox.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        
        emptyArray = suggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            return data = `<li>${data}</li>`;
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);

    }else{
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}

inputBox.addEventListener('click', function(){
    showSuggestions([]);
});

let listData = "";
function showSuggestions(list){

    if(!list.length){
        userValue = inputBox.value;
        // console.log(userValue);
        $.ajax({
            type: 'GET',
            url: '/courses/search/' + userValue,

            success: function(data){
                if(data.result){
                    suggBox.innerHTML = data.result;
                    searchWrapper.classList.add("active"); //show autocomplete box
                }
            }
        }).error(function(){
            listData += '<a href="/allcourses/category?key=' + userValue + '"><li>{{trans('home.search placeholder')}}' + ' ' + userValue + '</li></a>';
            suggBox.innerHTML = listData;
        });

    }else{
    //   listData = list.join('');
    }
}
</script>
<!-- END DESKTOP SEARCH SCRIPT -->






<!-- START MOBILE SEARCH SCRIPT -->
<script>
const mobileSearchWrapper = document.querySelector(".mobile-search-input");
const mobileInputBox = mobileSearchWrapper.querySelector("input");
const mobileSuggBox = mobileSearchWrapper.querySelector(".autocom-box");
const mobileDeleteRecentSearch = document.querySelectorAll(".delete-search");
let mobileSuggestions = [
];

document.addEventListener('click', function (el){
    if(!el.target.classList.contains('search-input-input') && !el.target.classList.contains('delete-search')){
        mobileSearchWrapper.classList.remove("active");
    }

    if(el.target.classList.contains('delete-search')){
        $.ajax({
            type: 'GET',
            url: '/searchkeys/' + el.target.id + '/delete',

            success: function(){
                el.target.parentElement.parentElement.remove();
            }
        });
    }
});

// if user press any key and release
mobileInputBox.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        
        emptyArray = mobileSuggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            return data = `<li>${data}</li>`;
        });
        mobileSearchWrapper.classList.add("active"); //show autocomplete box
        mobileShowSuggestions(emptyArray);

    }else{
        mobileSearchWrapper.classList.remove("active"); //hide autocomplete box
    }
}

mobileInputBox.addEventListener('click', function(){
    mobileShowSuggestions([]);
});

let mobileListData = "";
function mobileShowSuggestions(list){

    if(!list.length){
        userValue = mobileInputBox.value;
        // console.log(userValue);
        $.ajax({
            type: 'GET',
            url: '/courses/search/' + userValue,

            success: function(data){
                if(data.result){
                    mobileSuggBox.innerHTML = data.result;
                    mobileSearchWrapper.classList.add("active"); //show autocomplete box
                }
            }
        }).error(function(){
            listData += '<a href="/allcourses/category?key=' + userValue + '"><li>{{trans('home.search placeholder')}}' + ' ' + userValue + '</li></a>';
            mobileSuggBox.innerHTML = mobileListData;
        });

    }else{
    //   listData = list.join('');
    }
}
</script>
<!-- END MOBILE SEARCH SCRIPT -->