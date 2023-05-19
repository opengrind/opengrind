## Design goals

- The least amount of dependencies possible
- If possible, no javascript, this is why we use Livewire
- The least amount of queues possible

## Tests

```
npx husky-init && npm install lint-staged --save-dev
npx husky add ./.husky/pre-commit 'npx --no-install lint-staged'
```
