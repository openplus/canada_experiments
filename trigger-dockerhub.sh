#!/usr/bin/env bash

# This script is used by Travis in order to trigger an automated build in Docker Hub.
if [[ $TRAVIS_BRANCH == "8.x-1.x" ]] && [[ $TRAVIS_PULL_REQUEST == "false" ]]
then
  curl -H "Content-Type: application/json" --data '{"build": true}' -X POST https://registry.hub.docker.com/u/openplus/site-canada-experiments/trigger/$DOCKERHUB_TOKEN/
fi
