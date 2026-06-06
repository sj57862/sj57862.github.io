import router from "../index";
import {db} from "../../public/javascripts/pizza";

router.get('edit/:id',function (res,req,next){
   const id = res.params.id;
   const pizza = db
       .prepare('SELECT * FROM Pizza WHERE id = ?')
       .get(id);
   req.render('pizza/edit',{pizza:pizza});
});