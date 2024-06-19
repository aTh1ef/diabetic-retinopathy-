
from __future__ import division, print_function
# coding=utf-8
import sys
import os
import glob
import re
import numpy as np
import cv2
# Keras
from keras.applications.imagenet_utils import preprocess_input, decode_predictions
from keras.models import load_model
from keras.preprocessing import image

# Flask utils
from flask import Flask, redirect, url_for, request, render_template
from werkzeug.utils import secure_filename
from gevent.pywsgi import WSGIServer
from tensorflow.keras.preprocessing import image
# Define a flask app
app = Flask(__name__)

# Model saved with Keras model.save()


# Load your trained model
model = load_model('model/converted_keras/keras_model.h5')
model.make_predict_function()          # Necessary
print('Model loaded. Start serving...')


def model_predict(img_path, model):
    img = image.load_img(img_path, target_size=(224, 224))  # Resize image to (224, 224)

    x = image.img_to_array(img)
    x = np.expand_dims(x, axis=0)
    x = preprocess_input(x)

    preds = model.predict(x)

    # Assign class labels
    labels = ['No DR', 'Mild DR', 'Moderate DR', 'Severe DR', 'Proliferative DR']
    class_index = np.argmax(preds[0])
    pred_class = labels[class_index]

    return pred_class







@app.route('/', methods=['GET'])
def index():
 	
    return render_template('index.html')


@app.route('/predict', methods=['GET', 'POST'])
def upload():
    if request.method == 'POST':
        # Get the file from post request
        f = request.files['file']

        # Save the file to ./uploads
        basepath = os.path.dirname(__file__)
        file_path = os.path.join(
            basepath, 'uploads', secure_filename(f.filename))
        f.save(file_path)

        # Make prediction
        preds = model_predict(file_path, model)

        # Process your result for human
        pred_class = preds#.argmax()#(axis=-1)            # Simple argmax
        #pred_class = decode_predictions(preds, top=1)   # ImageNet Decode
        result = str(pred_class)               # Convert to string
        return result
    return None


if __name__ == '__main__':
    # app.run(port=5002, debug=True)

    # Serve the app with gevent
    http_server = WSGIServer(('', 5000), app)
    http_server.serve_forever()
