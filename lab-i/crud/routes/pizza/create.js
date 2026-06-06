import router from "../index";
import {db} from "../../public/javascripts/pizza";

router.get("create",function (req,res,next){
    res.render('pizza/create');
})

router.post("create",function (req,res,next){
    const pizza = req.body.pizza;
    db.prepare("" +
        "INSERT INTO PIZZA(name,price,description) VALUES (?,?,?)")
        .run(pizza.name,pizza.price,pizza.description);

    const pizzas = db.prepare('SELECT * FROM Pizza').all();
    res.render('pizza/index',{pizzas:pizzas});
})