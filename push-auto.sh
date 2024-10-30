#!/bin/bash

# Check for changes
if [[ -n $(git status --porcelain) ]]; then
    echo "Changes detected, preparing to commit..."

    # Stage all changes
    git add .

    # Commit changes with a timestamp
    git commit -m "Updated new features on v0.1 $(date +"%Y-%m-%d %H:%M:%S")"

    # Pull changes from the remote repository
    if git pull origin master; then
        # Push changes to the master branch
        if [ -z "$GITHUB_TOKEN" ]; then
            echo "Error: GITHUB_TOKEN environment variable is not set."
            exit 1
        fi

        # Use the token to push changes
        git push https://$GITHUB_TOKEN@github.com/basant0x01/lazyDB.git master
        echo "Changes pushed to GitHub."
    else
        echo "Failed to pull changes. Resolve conflicts and try again."
        exit 1
    fi
else
    echo "No changes to commit."
fi
