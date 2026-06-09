from flask import Flask, redirect, url_for
import os
from src.db.database import db
from src.routes.pizza import pizza

app = Flask(__name__, template_folder='templates')
BASE_DIR = os.path.dirname(__file__)
db_path = os.path.join(BASE_DIR, 'src', 'db', 'data.db')

app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///' + db_path
db.init_app(app)
app.register_blueprint(pizza, url_prefix='/pizza')


@app.get('/')
def home():
    return redirect(url_for('pizza.index'))

#DATABASE
from src.db.db_models import Pizza
with app.app_context():
    db.create_all()
####
if __name__ == "__main__":
    app.run(debug=True)
