<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Cake\ORM\Query;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Tags');
    }
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->tag_string) {
            $entity->tags = $this->_buildTags($entity->tag_string);
        }
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
        // On ne garde que le nombre de caractère correspondant à la longueur
        // maximum définie dans notre schéma
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->minLength('title', 1)
            ->maxLength('title', 255)
            ->notEmpty('body')
            ->minLength('body', 1);
        return $validator;
    }
    // L'argument $query est une instance du Query builder.
// Le tableau $options va contenir l'option 'tags' que nous avons passé
// à find('tagged') dans notre action de controller.
    public function findTagged(Query $query, array $options)
    {
        $columns = [
            'Articles.id', 'Articles.user_id', 'Articles.title',
            'Articles.body', 'Articles.published', 'Articles.created',
            'Articles.slug',
        ];
        $query = $query
            ->select($columns)
            ->distinct($columns);
        if (empty($options['tags'])) {
        // si aucun tag n'est fourni, trouvons les articles qui n'ont pas de tags
            $query->leftJoinWith('Tags')
                ->where(['Tags.title IS' => null]);
        } else {
        // Trouvons les articles qui ont au moins un des tags fourni
            $query->innerJoinWith('Tags')
                ->where(['Tags.title IN' => $options['tags']]);
        }
        return $query->group(['Articles.id']);
    }
    protected function _buildTags($tagString)
    {
    // Trim des tags
        $newTags = array_map('trim', explode(',', $tagString));
    // Retire les tags vides
        $newTags = array_filter($newTags);
    // Dé-doublonne les tags
        $newTags = array_unique($newTags);
        $out = [];
        $query = $this->Tags->find()
            ->where(['Tags.title IN' => $newTags]);
    // Retire les tags existant de la liste des nouveaux tags.
        foreach ($query->extract('title') as $existing) {
            $index = array_search($existing, $newTags);
            if ($index !== false) {
                unset($newTags[$index]);
            }
        }
    // Ajout des tags existant.
        foreach ($query as $tag) {
            $out[] = $tag;
        }
    // Ajout des nouveaux tags.
        foreach ($newTags as $tag) {
            $out[] = $this->Tags->newEntity(['title' => $tag]);
        }
        return $out;
    }
}
