import SectionHeader from "./SectionHeader";

const header = {
	label: 'Этапы работы',
	title: 'От звонка до доставки на объект',
	descr: 'Поможем подобрать готовую бытовку из наличия или рассчитаем изготовление под заказ. Согласуем комплектацию, стоимость, сроки и доставку по Беларуси.'
}

let list = [
	{
		icon: "public/images/steps/icon-1.svg",
		title: "Оставляете заявку",
		descr: "Свяжитесь с нами, чтобы обсудить нужное решение.",
	},
	{
		icon: "public/images/steps/icon-2.svg",
		title: "Уточняем задачу",
		descr: "Спрашиваем назначение, размер, комплектацию, утепление,электрику и место доставки.",
	},
	{
		icon: "public/images/steps/icon-3.svg",
		title: "Подбираем вариант",
		descr: "Предлагаем из наличия или рассчитываем изготовление под заказ.",
	},
	{
		icon: "public/images/steps/icon-4.svg",
		title: "Согласуем стоимость и сроки",
		descr: "Фиксируем цену, комплектацию, срок изготовления и условия доставки.",
	},
	{
		icon: "public/images/steps/icon-5.svg",
		title: "Доставляем на объект",
		descr: "Организуем доставку по Беларуси. Разгрузка и манипулятор обсуждаются отдельно.",
	},
]

export default () => {
	return (
		<section className="section steps" id="steps">
			<div className="container steps__container">
				<div className="steps__intro">
					<ul className="steps__terms terms">
						<li className="terms__item">
							Срок изготовления под заказ - до <span>10</span> рабочих дней.
						</li>
						<li className="terms__item">
							Гарантия на конструкции - <span>3</span> месяца
						</li>
					</ul>
					<SectionHeader {...header} />
				</div>
				<div className="swiper steps-swiper" data-swiper="{'slidesPerView': 'auto', 'spaceBetween': 25, 'rewind': true}">
					<div className="swiper-wrapper steps-swiper__wrapper">
						{list.map(({ icon, title, descr }, i) => (
							<div className="swiper-slide steps-slide">
								<div className="steps-slide__wrapper card-box">
									<div className="steps-slide__badge">
										<span className="steps-slide__number title-1">
											0{++i}
										</span>
										<div className="steps-slide__icon">
											<img src={icon} alt="" />
										</div>
									</div>
									<h3 className="steps-slide__title">
										{title}
									</h3>
									<div className="steps-slide__descr descr">
										<p>
											{descr}
										</p>
									</div>
								</div>
							</div>
						))}
					</div>
				</div>
				<div className="steps-swiper__btn-box swiper-btn-box visible-tablet">
					<button className="swiper-btn swiper-btn__prev steps-swiper__btn steps-swiper__btn-prev" type="button" aria-label="Назад" data-swiper-btn-prev=".steps-swiper"></button>
					<button className="swiper-btn swiper-btn__next steps-swiper__btn steps-swiper__btn-next" type="button" aria-label="Вперёд" data-swiper-btn-next=".steps-swiper"></button>
				</div>
			</div>
		</section>
	)
};