<?php

namespace Database\Seeders;

use App\Enum\GroupPremission;
use App\Models\Group;
use App\Models\News;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->initUserAndGroups();

        if(env('APP_DEBUG')) {
            $news = [
                [
                    'title' => 'Новая функция в нашем приложении',
                    'description' => 'Мы рады сообщить о запуске новой функции, которая улучшит пользовательский опыт.',
                    'filepath' => 'uploads/news/new_feature.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Обновление безопасности',
                    'description' => 'Выпущено обновление, которое устраняет уязвимости в системе безопасности.',
                    'filepath' => 'uploads/news/security_update.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Событие месяца',
                    'description' => 'Присоединяйтесь к нам на нашем месячном событии, где мы обсудим последние новости и тренды.',
                    'filepath' => 'uploads/news/monthly_event.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Партнёрство с новой компанией',
                    'description' => 'Мы рады объявить о нашем новом партнёрстве с ведущей компанией в отрасли.',
                    'filepath' => 'uploads/news/partnership.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Запуск нового продукта',
                    'description' => 'С гордостью представляем наш новый продукт, который изменит правила игры.',
                    'filepath' => 'uploads/news/new_product.jpg',
                    'userId' => 1,
                ],
            ];

            $services = [
                [
                    'title' => 'Консультация',
                    'price' => 100,
                    'description' => 'Профессиональная консультация по всем вопросам.',
                    'filepath' => 'uploads/services/consultation.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Разработка веб-сайта',
                    'price' => 500,
                    'description' => 'Создание уникального веб-сайта под ключ.',
                    'filepath' => 'uploads/services/web_development.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'SEO-оптимизация',
                    'price' => 300,
                    'description' => 'Оптимизация вашего сайта для поисковых систем.',
                    'filepath' => 'uploads/services/seo_optimization.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Маркетинговая стратегия',
                    'price' => 400,
                    'description' => 'Разработка эффективной маркетинговой стратегии для вашего бизнеса.',
                    'filepath' => 'uploads/services/marketing_strategy.jpg',
                    'userId' => 1,
                ],
                [
                    'title' => 'Техническая поддержка',
                    'price' => 150,
                    'description' => 'Круглосуточная техническая поддержка для вашего бизнеса.',
                    'filepath' => 'uploads/services/technical_support.jpg',
                    'userId' => 1,
                ],
            ];

            News::query()->insert($news);
            Service::query()->insert($services);

            return;
        }
    }

    protected function initUserAndGroups() {
        $user = User::query()->find(1);
        $groups = Group::all();

        if($user && count($groups) > 2) {
            return;
        }

        foreach($groups as $group) {
            $group->delete();
        }

        $group = Group::query();

        $group->create([
            'title'      => 'admin',
            'permission' => GroupPremission::ADMIN,
        ]);

        $group->create([
            'title'      => 'moderator',
            'permission' => GroupPremission::MODERATOR,
        ]);

        $group->create([
            'title'      => 'user',
            'permission' => GroupPremission::USER,
        ]);

        if($user) {
            return;
        }

        User::factory()->create([
            'active'       => true,
            'username'     => 'admin',
            'password'     => 'admin',
            'groupId'      => 1,
        ]);
    }
}
