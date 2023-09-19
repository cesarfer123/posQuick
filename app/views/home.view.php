<?php require views_path('partials/header'); ?>
    <div class="d-flex">
        <div style="min-height:600px;" class="shadow-sm col-7 p-4">
            <div class="input-group mb-3"> <h3>Items</h3>
                <input oninput="search_item(event)" type="text" class="ms-4 form-control js-search" placeholder="Search" aria-label="Search" autofocus>
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <div onclick="add_item(event)" class="js-products d-flex" style="flex-wrap: wrap;height:90%;">

            </div>
        </div>
        <div class="col-5 bg-light p-4 pt-2">
            <div><center><h3>Cart <div class="js-item-count badge bg-primary rounded-circle"> 0 </div></h3></center></div>
            <div class="table-responsive" style="height: 400px; overflow-y:scroll;">
                <table class="table table-striped table-hover" >
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                    <tbody class="js-items">
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="js-gtotal alert alert-danger" style="font-size:30px;">Total: S/0</div>
            <div class="">
                <button class="btn btn-success my-2 w-100 py-4">Checkout</button>
                <button class="btn btn-primary my-2 w-100">Clear All</button>
            </div>
        </div>
    </div>


<script>

    let PRODUCTS=[];
    let ITEMS=[];

    function search_item(e){
        let text=e.target.value.trim();

        let data={};
        data.data_type="search";
        data.text=text;
        send_data(data);
    };
    
    function send_data(data){

        let ajax=new XMLHttpRequest();
        ajax.addEventListener("readystatechange", function(e){
            
            if(ajax.readyState==4){
                if(ajax.status==200){
                    handle_result(ajax.responseText);
                }else{
                    console.log("an error ocurred. Err Code" + ajax.status + " Err Message: " + ajax.statusText);
                  
                }
            }
        
        }) 
        
        ajax.open("post", "index.php?pg=ajax", true);

        ajax.send(JSON.stringify(data)); 

    }    

    function handle_result(result){
        // console.log(result);
        let obj=JSON.parse(result);

        if(typeof obj!="undefined"){

            if(obj.data_type=="search"){
               
                let mydiv=document.querySelector(".js-products");
                mydiv.innerHTML="";
                PRODUCTS=[];

                if(obj.data!=""){

                    PRODUCTS=obj.data;
                    for (let i = 0; i < obj.data.length; i++) {
                        mydiv.innerHTML+=product_html(obj.data[i],i);
                    }
                }

            }
        }
       
    }

    function product_html(data,index){

        return `<!-- card -->
                <div class="card m-2 border-0 mx-auto" style="min-width: 200px;max-width: 200px;">
                    <a href="#">
                        <img index="${index}" src="${data.image}" class="w-100 rounded border">
                    </a>
                    <div class="p-2">
                        <div class="text-muted">${data.description}</div>
                        <div style="font-size: 20px;"><b>${data.amount}</b></div>
                    </div>
                </div>
                <!-- end card --> 
                `;
    }

     function item_html(data){

        return `<!-- item --> 
                <tr>
                    <td style="width: 110px;"><img src="${data.image}" class="rounded border" style="width: 100px;height:100px;"></td>
                    <td class="text-primary">
                        ${data.description}
                        <div class="input-group mb-3" style="max-width: 150px;">
                            <span class="input-group-text" style="cursor: pointer;"><i class="fa-solid fa-minus text-primary"></i></span>
                            <input type="text" class="form-control" placeholder="1" value="${data.qty}">
                            <span class="input-group-text" style="cursor: pointer;"><i class="fa-solid fa-plus text-primary"></i></span>
                        </div>
                    </td>
                    <td style="font-size: 20px;">S/${data.amount}</td>
                </tr>
                <!-- end item--> 
                `;
    }


    function add_item(e){

        if(e.target.tagName=="IMG"){
            let index=e.target.getAttribute("index");
            // check if items exists 
            for (let i = ITEMS.length-1; i >= 0; i--) {
                
                if(ITEMS[i].id==PRODUCTS[index].id){

                    ITEMS[i].qty+=1;
                    refresh_items_display();
                    return;
                }
            } 
             
            let temp=PRODUCTS[index];
            temp.qty=1;
            console.log(temp);
            ITEMS.push(temp);
            refresh_items_display();
        }
    }


    function refresh_items_display(){

        let item_count=document.querySelector(".js-item-count");
        item_count.innerHTML=ITEMS.length;

        let items_div=document.querySelector(".js-items");
        items_div.innerHTML="";

        let grand_total=0;
        for(let i=ITEMS.length -1; i>=0;i--){
            items_div.innerHTML+=item_html(ITEMS[i]);
            grand_total+=(ITEMS[i].qty*ITEMS[i].amount)
        }

        let gtotal_div=document.querySelector(".js-gtotal");
        gtotal_div.innerHTML="TOTAL: " + grand_total;

    }

    send_data({
        data_type:"search",
        text:""
    });




    

</script>

<?php require views_path('partials/footer'); ?>
