from flask import Blueprint, redirect, render_template, request, url_for
from ..db.database import db
from ..db.db_models import Pizza

pizza = Blueprint("pizza", __name__)

#INDEX
@pizza.get('/')
def index():
    pizza = db.session.execute(db.select(Pizza)).scalars().all()
    return render_template('pizza/index.html',pizzas = pizza)

#CREATE
@pizza.get('/create')
def create():
    return render_template('pizza/create.html')

@pizza.post('/create')
def create_post():
    name = request.form.get('name')
    description = request.form.get('description')
    price = request.form.get('price')

    new_pizza = Pizza(name=name, description=description, price=price)
    db.session.add(new_pizza)
    db.session.commit()

    return redirect(url_for('pizza.show', id=new_pizza.id))
###

#SHOW
@pizza.get('/<int:id>')
def show(id):
    pizza = db.session.get(Pizza, id)
    if not pizza:
        return render_template('pizza/show.html', error="Pizza not found.")
    return render_template('pizza/show.html', pizza=pizza)
###

#EDIT
@pizza.get('/<int:id>/edit')
def edit(id):
    pizza = db.session.get(Pizza, id)
    if not pizza:
        return render_template('pizza/edit.html', error="Pizza not found.")
    return render_template('pizza/edit.html', pizza=pizza)

@pizza.post('/edit')
def edit_post():
    id = request.form.get('id', type=int)
    pizza = db.session.get(Pizza, id)
    if not pizza:
        return render_template('pizza/edit.html', error="Pizza not found.")

    pizza.name = request.form.get('name')
    pizza.description = request.form.get('description')
    pizza.price = request.form.get('price')

    db.session.commit()
    return redirect(url_for('pizza.show', id=pizza.id))
###

#DELETE
@pizza.post('/delete')
def delete_post():
    id = request.form.get('id', type=int)
    pizza = db.session.get(Pizza, id)
    if not pizza:
        pizzas = db.session.execute(db.select(Pizza)).scalars().all()
        return render_template('pizza/index.html', pizzas=pizzas, error="Pizza not found.")

    db.session.delete(pizza)
    db.session.commit()
    return redirect(url_for('pizza.index'))
