export const portfolio = {
    data: [
        {
            "id": 1,
            "name": "WOW Eggs",
            "category": "Grocery",
            "tags": [
                "Design",
                "Branding",
                "Development"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/1.jpg",
                "frontend\/assets\/images\/portfolio\/1-1.jpg",
                "frontend\/assets\/images\/portfolio\/1-2.jpg"
            ],
            "content": "<p>Wow eggs is India's first egg production and delivery ecosystem which is involved in every step from bird rearing to delivery.<\/p><p>They raise birds in their own farms, make their own green vegetarian feed, collect and deliver the eggs through their own delivery channels resulting in high-quality, protein-rich, chemical-free eggs for you and your family.<\/p>"
        },
        {
            "id": 2,
            "name": "Cabins 24\/7",
            "category": "Coworking",
            "tags": [
                "Branding",
                "Development"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/3.jpg",
                "frontend\/assets\/images\/portfolio\/3-1.jpg",
                "frontend\/assets\/images\/portfolio\/3-2.jpg"
            ],
            "content": "<p>Cabins 24x7 Coworking, offer more than just an office space, they aim to be a way of life! They provide a holistic experience to member companies by offering enterprise-focused solutions and the productivity infused environment with a viable business model for the globally trusted enterprises.<\/p>"
        },
        {
            "id": 3,
            "name": "PNM Healthcare",
            "category": "Health",
            "tags": [
                "Design",
                "Branding",
                "Development",
                "Product Photography"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/4.jpg",
                "frontend\/assets\/images\/portfolio\/4-2.jpg",
                "frontend\/assets\/images\/portfolio\/4-1.jpg"
            ],
            "content": "<p>PNM Healthcare is India's one of the fastest growing online pharmaceutical companies. With a vision to make healthcare more accessible, affordable and available for all, their services have impacted people's lives for 6 glorious years.<\/p>"
        },
        {
            "id": 4,
            "name": "Curifie",
            "category": "Management",
            "tags": [
                "Branding",
                "Development"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/5.jpg",
                "frontend\/assets\/images\/portfolio\/5-1.jpg",
                "frontend\/assets\/images\/portfolio\/5-2.jpg",
            ],
            "content": "<p>Curifie is a complete business management solution, which acts like your personal assistance.It manages your team as well your to-do, also provides regular updates to your customer, maintaining good customer relationships. It is the most user friendly management software with the ability to manage your company in a hustle free manner.<\/p>"
        },
        {
            "id": 5,
            "name": "US Forex",
            "category": "Finance",
            "tags": [
                "Development"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/6.jpg",
                "frontend\/assets\/images\/portfolio\/6-1.jpg",
                "frontend\/assets\/images\/portfolio\/6-2.jpg",
            ],
            "content": "<p>USforex is a complete trade finance solution Web Application Portal which helps clients make trade payments, access liquidity, and manage risk. It also has a Wallet feature which makes it more convenient.<\/p>"
        },
        {
            "id": 6,
            "name": "Enva Plax",
            "category": "Ecommerce",
            "tags": [
                "Development",
                "Branding"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/7.jpg",
                "frontend\/assets\/images\/portfolio\/7-1.jpg",
                "frontend\/assets\/images\/portfolio\/7-2.jpg"
            ],
            "content": "<p>Enva Plax is dedicated to serving and protecting the environment. They assist people in eliminating l environment-harming methods and adopting sustainable solutions.They have a 3C (Consult, Conceptualize, Craft) approach while providing our 100% biodegradable, premium-quality solutions.<\/p>"
        },
        {
            "id": 7,
            "name": "JNC Education Hub",
            "category": "Education",
            "tags": [
                "Development"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/8.jpg",
                "frontend\/assets\/images\/portfolio\/8-1.jpg",
                "frontend\/assets\/images\/portfolio\/8-2.jpg"
            ],
            "content": "<p>JNC Education Hub | Prepare For Your Future Good infrastructure facilities have been created to cope with the increase in enrolment of students in various on-campus programmes.<\/p><p>They provide high-tech class rooms and digital library facilities as some of the latest technological facilities created in any University.<\/p>"
        },
        {
            "id": 8,
            "name": "Arshi Beauty",
            "category": "Cosmetic",
            "tags": [
                "Cosmetic",
                "Beauty"
            ],
            "images": [
                "frontend\/assets\/images\/portfolio\/2.jpg",
                "frontend\/assets\/images\/portfolio\/2-1.jpg",
                "frontend\/assets\/images\/portfolio\/2-2.jpg"
            ],
            "content": "<p>Arshi Beauty a vegan and cruelty free cosmetic brand. They have a wide range of cosmetic products from eyelashes to lipliners.<\/p>"
        }
    ],

    getData(id) {
        let output = portfolio.data.filter(item => {
            return item.id == id;
        });

        return output[0];
    }
};
