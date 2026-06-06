import {db} from '../../public/javascripts/pizza';
import router from "../index";
router.get('/',function (req,res,next){
    const pizzas = db.prepare('SELECT * FROM Pizza').all();
    res.render('pizza/index',{pizzas:pizzas});
});