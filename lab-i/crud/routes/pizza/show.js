import router from "../index";
import db from '../../public/javascripts/pizza'

router.get('show/:id',function (req,res,next){
    const id = req.params.id;
    const pizza = db.prepare(
        "SELECT * FROM Pizza WHERE id = ?"
    ).get(id);

    res.render('pizza/show',{pizza:pizza});
})