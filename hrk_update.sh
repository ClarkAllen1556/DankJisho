#!/usr/bin/env bash

# push/update heroku 
msg=$1
brch=$2

if [[ ! $brch ]] 
then
    brch="master"
fi

if [[ ! $msg ]] 
then
    msg=$(git status | grep "mod")
fi

echo "#####"
echo "#####"
echo 'Pushing to heroku with message: ' $msg
echo 'Branch: ' $brch
echo "#####"
echo "#####"

git add .
git commit -m $msg
git push heroku $brch